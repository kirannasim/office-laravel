<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Services;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Support\Transaction\RegistrationCallback;
use App\Blueprint\Support\Transaction\ExpirationCallback;
use App\Blueprint\Traits\UserDataFilter;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Eloquents\CustomField;
use App\Eloquents\Package;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Requests\RegistrationValidation;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

/**
 * Class UserServices
 * @package App\Blueprint\Services
 */
class UserServices
{
    use UserDataFilter;

    /**
     * @param array $options
     * @return User|Builder|\Illuminate\Database\Eloquent\Collection
     */
    function topEarners($options = [])
    {
        /** @var TransactionServices $transactionService */
        $transactionService = app(TransactionServices::class);
        $options = collect([
            'sortBy' => 'earnings'
        ])->merge($options);
        $query = User::query()->toBase();
        $payeeColumn = $query->getGrammar()->wrap((new Transaction)->getTable() . '.' . 'payee');
        $userColumn = $query->getGrammar()->wrap((new User)->getTable() . '.' . (new User)->getKeyName());
        isAdmin() ? $model = User::query() : $model = User::find(loggedId())->descendants([], 'sponsor', false);
        $usersQuery = $model->selectSub($transactionService->getTransactions(collect([
            'operation' => TransactionOperation::slugToId('commission')
        ]))->whereRaw("$payeeColumn = $userColumn")->selectRaw('SUM(`amount`)')->getQuery(), 'earnings');

        return $this->getUsers($options, $usersQuery);
    }

    /**
     * @param Collection $args
     * @param null|User $userModel
     * @param bool $returnQuery
     * @param array $eagerLoads
     * @return Collection|Builder|mixed
     */
    function getUsers(Collection $args, $userModel = null, $returnQuery = false, $eagerLoads = [])
    {
        $defaults = collect([
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
            'fromDate' => User::min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'status' => true,
        ]);
        $options = $defaults->merge($args);
        $eagerLoads = $eagerLoads ?: ['repoData', 'metaData'];
        /** @var User|Builder $userModel */
        $userModel = $userModel ?: (new User)->newQuery();
        $columns = Schema::getColumnListing((new User)->getTable());
        /** @var Builder $query */
        $query = $userModel->with($eagerLoads)->addSelect($columns)
            ->when(($userId = $options->get('userId')), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('id', $userId);
            })
            ->when(($status = $options->get('status')), function ($query) use ($status) {
                /** @var Builder $query */
                //$query->where('status', $status);
            })->when($memberId = $options->get('memberId'), function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->where('customer_id', $memberId);
            })->when($options->get('groupBy'), function ($query) use ($options) {
                /** @var Builder $query */
                $this->groupBy($query, $options->get('groupBy'));
            })
            ->when($options->get('limit'), function ($query) use ($options) {
                /** @var Builder $query */
                $query->take($options->get('limit'));
            })
            ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->orderBy($options->get('sortBy'), $options->get('orderBy'));

        if ($returnQuery) return $query;

        try {
            $query->get();
        } catch (Exception $e) {
            dd($query->toSql());
        }
        return $query->get()->map(function ($user) use ($options) {
            return $this->withExtraInfo($user, ['wallet' => $options->get('wallet')]);
        })->filter(function ($user) use ($options) {
            if ($walletId = $options->get('wallet')) {
                /** @var WalletModuleInterface|ModuleBasicAbstract $wallet */
                $wallet = getModule((int)$walletId);
                //$slug = Str::camel($wallet['registry']['key']);
                $slug = Str::camel($wallet->registry['key']);
                $walletBalance = isset($user->wallet[$slug]['balance']) ? $user->wallet[$slug]['balance'] : $wallet->getBalance($user);
                // Check user balance
                if (($balance = $options->get('balance')) && $walletBalance !== $balance)
                    return false;
                // Check minimum balance
                if (($minBalance = $options->get('minBalance')) && $walletBalance < $minBalance)
                    return false;
                // Check maximum balance
                if (($maxBalance = $options->get('maxBalance')) && $walletBalance > $maxBalance)
                    return false;
            }

            if ($userId = $options->get('userId')) if ($user->id !== (int)$userId) return false;

            return true;
        });
    }

    /**
     * @param Builder $query
     * @param string $groupBy
     * @param string $timestampColumn
     * @return Builder
     */
    function groupBy(Builder &$query, $groupBy = 'month', $timestampColumn = 'created_at')
    {
        switch ($groupBy) {
            case 'month':
            case 'year':
            case 'day':
            case 'hour':
                /** @var Builder $query */
                $query->groupBy(DB::raw("$groupBy($timestampColumn)"))
                    ->selectRaw("MONTH($timestampColumn) month, YEAR($timestampColumn) year, DAY($timestampColumn) day, HOUR($timestampColumn) hour, COUNT(1) total");
                break;
            default:
                /** @var Builder $query */
                $query->groupBy($groupBy);
                break;
        }

        return $query;
    }

    /**
     * @param User $user
     * @param array $args
     * @return User
     */
    function withExtraInfo(User $user, $args = [])
    {
        $args = collect($args ?: []);
        $moduleService = app(ModuleServices::class);
        // Setting wallet details
        foreach ($moduleService->getWalletPool() as $key => $wallet) {
            /** @var WalletModuleInterface|ModuleBasicAbstract $wallet */
            $slug = $wallet->getRegistry()['key'];

            if ($slug == 'BusinessWallet') continue;

            if (($walletId = (int)$args->get('wallet')) && ($wallet->moduleId !== $walletId)) continue;
            /** @var WalletModuleInterface|ModuleBasicAbstract $wallet */
            $wallet = callModule($wallet->moduleId);
            $user->wallet = array_merge((array)$user->wallet, [
                Str::camel($slug) => [
                    'balance' => $wallet ? $wallet->getBalance($user) : 0,
                ]
            ]);
        }

        return $user;
    }

    /**
     * @param Collection $args
     * @param null $repoModel
     * @return Collection|Builder|mixed
     */
    function getUserRepo(Collection $args, $repoModel = null)
    {
        $defaults = collect([
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
            'fromDate' => (new User)->min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'status' => true,
        ]);
        $options = $defaults->merge($args);
        /** @var User|Builder $userModel */
        $repoModel = $repoModel ?: (new UserRepo())->newQuery();
        $repoTable = $repoModel->getModel()->getTable();
        $userTable = (new User)->getTable();
        $userKey = (new User)->getKeyName();
        $userForeignKey = (new User)->getForeignKey();

        /** @var \Illuminate\Database\Eloquent\Collection $users */
        return $repoModel->with('user.metaData')
            ->selectRaw("$repoTable.*, $userTable.*")
            ->from($repoTable)
            ->join($userTable, "$userTable.$userKey", '=', "$repoTable.$userForeignKey")
            ->whereBetween("$userTable.created_at", [$options->get('fromDate'), $options->get('toDate')])
            ->when($options->get('groupBy'), function ($query) use ($userTable, $options) {
                $this->groupBy($query, $options->get('groupBy'), $userTable . '.' . $this->wrapColumn('created_at'));
            });
    }

    /**
     * @param $value
     * @return string
     */
    function wrapColumn($value)
    {
        $query = User::query()->toBase();

        return $query->getGrammar()->wrap($value);
    }

    /**
     * @param array $options
     * @return User|Builder|\Illuminate\Database\Eloquent\Collection
     */
    function topSponsors($options = [])
    {
        $options = collect([
            'sortBy' => 'downlines'
        ])->merge($options);
        $query = UserRepo::query()->toBase();
        $userColumn = $query->getGrammar()->wrap((new User)->getTable() . '.' . (new User)->getKeyName());
        $matchingColumn = $query->getGrammar()->wrap((new UserRepo())->getTable() . '.' . 'sponsor_id');
        isAdmin() ? $model = User::query() : $model = User::find(loggedId())->descendants([], 'sponsor', false);
        $usersQuery = $model->selectSub($query->whereRaw("$userColumn = $matchingColumn")
            ->selectRaw('COUNT(1)'), 'downlines');

        return $this->getUsers($options, $usersQuery);
    }

    /**
     * @param User|integer $user
     * @param array|string $relations
     * @return User
     */
    function getUser($user, $relations = null)
    {
        $user = $user instanceof User ? $user : User::find($user);

        if ($relations) $user->load(is_array($relations) ? implode(',', $relations) : $relations);

        return $this->withExtraInfo($user);
    }

    /**
     * Handles user data insertion tasks
     *
     * @param Collection $data
     * @param bool $addToRepo
     * @return User|boolean
     */
    function addUser(Collection $data, $addToRepo = true)
    {
        /** @var ConfigServices $config */
        $config = app(ConfigServices::class);
        // check for dynamic username generation
        if (getConfig('registration', 'username_type') != 'static')
            $data->put('username', $this->randomUsername());
        //Adding member id
        $data->put('customer_id', $this->generateCustomerId());
        $data->put('sponsor_id', $sponsorId = idFromUsername($data->get('sponsor')));
        //$package = getPackageInfo($data->get('products')[0]['productId']);
        $package = Package::find($data->get('selectedPackage'));

        if($package)
        {
            $data->put('package_id', $package->id);
            $data->put('signup_package', $package->id);
            if ($package->validity_in_month)
                $data->put('expiry_date', Carbon::now()->addMonth($package->validity_in_month));    
        }
        
        // Adding user basic data
        $user = User::create($this->formatBasicData($data));
        // Adding user repo data
        /** @var User $sponsor */
        $sponsor = User::find($sponsorId);
        $registerAutomatically = HoldingTank::where('user_id', $sponsor->id)->get()->first();
        $addToRepo = (isset($registerAutomatically->status) && $registerAutomatically->status && $sponsor->repoData) ? true : false;

        $addToRepo = true;

        if ($addToRepo) {
            $repoData = $this->formatRepoData($data, $user);
            $prepend = defineFilter('appendOrPrepend', [], 'placement', $repoData);
            $user->repoData($repoData, $prepend);
            $user->update(['is_confirmed' => true]);
        } elseif (isset($registerAutomatically->status) && $registerAutomatically->status) {
            $user->update([
                'is_confirmed' => true,
                'preferred_position' => $registerAutomatically->default_position
            ]);
        }

        if($package)
        {
            //assign IB rank
            if($package->slug != 'affiliate' ){
                AdvancedRankUser::create([
                    'user_id' => $user->id,
                    'rank_id' => 1
                ]);

                AdvancedRankAchievementHistory::create([
                    'user_id' => $user->id,
                    'rank_id' => 1
                ]);
            }    
        }
        

        // Extracts custom fields from data
        $customFields = array_map(function ($value) {
            return new CustomField(array_only($value, ['meta_key', 'meta_value', 'group']));
        }, $config->extractCustomFields($data->all()));
        // Adding to meta
        $user->metaData($this->formatMetaData($data));
        // Adding user role data
        $user->userRoleData($data->get('role', ['type_id' => 3, 'sub_type_id' => 3]));
        // adding custom fields in case registering from client-side form
        $user->customFields($customFields);
        //DB::select('call update_user_repo(' . $user->id . ',' . $repoData['sponsor_id'] . ',' . $repoData['parent_id'] . ')');
        return $user;
    }

    function increaseexpire(Collection $data)
    {
        $user = loggedUser();
        $package = Package::find($user->package_id);
        
        $user->update([
            'expiry_date'=>Carbon::now()->addMonth($package->validity_in_month)->toDateTimeString()
        ]);
        return $user;
    }


    function addUserDirectly(Collection $data){
        if(isset($data->expire) && $data->expire)
        {
            $user = loggedUser();
            $package = Package::find($user->package_id);
            $user->update([
                'expiry_date'=>Carbon::now()->addMonth($package->validity_in_month)
            ]);
            return $user;
        }
        /** @var ConfigServices $config */
        $config = app(ConfigServices::class);
        // check for dynamic username generation
        if (getConfig('registration', 'username_type') != 'static')
            $data->put('username', $this->randomUsername());
        //Adding member id
        $data->put('customer_id', $this->generateCustomerId());
        $data->put('sponsor_id', $sponsorId = idFromUsername($data->get('sponsor')));
        //$package = getPackageInfo($data->get('products')[0]['productId']);
        $package = Package::find($data->get('selectedPackage'));
        $data->put('package_id', $package->id);
        $data->put('signup_package', $package->id);

        if ($package->validity_in_month)
            $data->put('expiry_date', Carbon::now()->addMonth($package->validity_in_month));
        // Adding user basic data
        $user = User::create($this->formatBasicData($data));

        $Parent = UserRepo::where('user_id','=',$data['parent'])->first();//13

        $data->put('placement',$data->get('parent'));
        $data->put('user_level',$Parent->user_level+1);

        $repoData = $this->formatRepoData($data, $user);
        $prepend = defineFilter('appendOrPrepend', [], 'placement', $repoData);
        $user->repoData($repoData, $prepend);
        $user->update(['is_confirmed' => true]);

        UserRepo::where([
            'parent_id'=>$data->get('parent_id'),
            'position'=>$data->get('position')
        ])->where('user_id','<>',$user->id)
          ->update([
            'parent_id'=>$user->id,
            'user_level'=>$Parent->user_level+2
        ]);

        // Extracts custom fields from data
        $customFields = array_map(function ($value) {
            return new CustomField(array_only($value, ['meta_key', 'meta_value', 'group']));
        }, $config->extractCustomFields($data->all()));
        // Adding to meta
        $user->metaData($this->formatMetaData($data));

        // Adding user role data
        $user->userRoleData($data->get('role', ['type_id' => 3, 'sub_type_id' => 3]));
        // adding custom fields in case registering from client-side form
        $user->customFields($customFields);

        return $user;
    }
    /**
     * Generate random username that is available to register
     *
     * @return bool|string
     */
    function randomUsername()
    {
        $prefix = getConfig('registration', 'username_prefix');
        $length = getConfig('registration', 'username_length');

        while (!User::where('username', $username = $prefix . randomString($length))->exists()) {
            return $username;
            break;
        }

        return false;
    }

    /**
     * Verify sponsor name
     *
     * @param $name
     * @return bool
     */
    function verifySponsor($name)
    {
        return User::where('username', $name)->exists();
    }

    /**
     * Verify username name
     *
     * @param array $param user details
     * @return boolean
     */
    function verifyUsername($param)
    {
        if (strlen($param) < 6) {
            return false;
        }

        return User::where('username', $param)->exists();
    }

    /**
     * Verify email
     *
     * @param string $param user details
     * @return boolean
     */
    function verifyEmail($param)
    {
        return !User::where('email', $param)->exists() && filter_var($param, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param PaymentServices $paymentServices
     * @param RegistrationValidation $request
     * @param RegistrationCallback $registrationCallback
     * @param OrderServices $orderServices
     * @param ModuleServices $moduleServices
     */
    function handleRegistrationRequest(
        PaymentServices $paymentServices,
        RegistrationValidation $request,
        RegistrationCallback $registrationCallback,
        OrderServices $orderServices, ModuleServices $moduleServices)
    {
        $orderServices->keepOrder(true, $request);
        $paymentServices->setGateway((int)$request->input('gateway'))
            ->setCallback($registrationCallback)
            ->setPayable($paymentServices->getPayable('cart')
                ->setToModule($moduleServices->slugToId('Wallet-BusinessWallet'))
                ->setOperation('registration')
                ->setPayee(User::companyUser())
                ->setPayer(loggedUser() ?: User::companyUser())
                ->setContext('Registration'));
        registerAction('postPaymentProcessAction', function ($response) {
            app()->call([$this, 'unsetRegistrationData']);
        }, 'registration');
    }

    function handleExpireRegistrationRequest(
        PaymentServices $paymentServices,
        Request $request,
        ExpirationCallback $expirecallback,
        OrderServices $orderServices, ModuleServices $moduleServices)
    {
        $orderServices->keepOrder(true, $request);
        $paymentServices->setGateway((int)$request->input('gateway'))
            ->setCallback($expirecallback)
            ->setPayable($paymentServices->getPayable('cart')
                ->setToModule($moduleServices->slugToId('Wallet-BusinessWallet'))
                ->setOperation('registration')
                ->setPayee(User::companyUser())
                ->setPayer(loggedUser() ?: User::companyUser())
                ->setContext('Registration'));
        registerAction('postPaymentProcessAction', function ($response) {
            app()->call([$this, 'unsetRegistrationData']);
        }, 'registration');
    }

    /**
     * Unset session data after successful registration
     *
     * @param CartServices $cartServices
     * @param OrderServices $orderServices
     * @return bool
     */
    function unsetRegistrationData(CartServices $cartServices, OrderServices $orderServices)
    {
        $cartServices->clear();
        $orderServices->clearSession();

        return true;
    }

    /**
     * Get ProfileData
     *
     * @param $id
     * @return mixed
     */
    function getProfileData($id)
    {
        $user = DB::table('users')
            ->select('*')
            ->join('user_repo', 'users.id', '=', 'user_repo.user_id')
            ->join('user_meta', 'users.id', '=', 'user_meta.user_id')
            ->where('users.id', '=', $id)
            ->get()->first();

        $sponsor = User::find($user->sponsor_id);

        $user->sponsor_name = $sponsor ? $sponsor->username : '';

        $placement = User::find($user->parent_id);

        $user->placement_name = $placement ? $placement->username : '';

        return $user;
    }

    /**
     * @param $userID
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    function getSponsorId($userID)
    {
        return User::find($userID)->sponsor()->id;
    }

    /**
     * @param $userID
     * @return mixed
     */
    function getPlacementId($userID)
    {
        return User::find($userID)->parent()->id;
    }

    /**
     * @param $userID
     * @return mixed
     */
    function getUserType($userID)
    {
        return User::find($userID)->userType->title;
    }

    /**
     * @param $userID
     * @return mixed
     */
    function getSponsorMembersCount($userID)
    {
        return  User::where('sponsor_id', $userID)->count();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public function getUserProfile($id)
    {
        return User::with(['RepoData', 'MetaData'])->find($id);
    }

    /**
     * @return string
     */
    function generateCustomerId()
    {
        // 6 digit random number, unique in DB
        $attempt = 1;
        $attempt_max = 5;
        $customer_id = null;
        do {
            $customer_id = rand(100000,999999);
            $attempt++;
        } while (User::where('customer_id', $customer_id)->exists() && $attempt <= $attempt_max);

        if ($attempt > $attempt_max) {
            \Log::error("[\App\Blueprint\Services\UserServices::generateCustomerId] Could not generate unique customer_id");
            abort(500, 'Could not generate unique Customer ID. Please contact Support.');
        }

        return $customer_id;
    }

    function pendingCallbackResponse($transaction)
    {
        /** @var OrderServices $orderServices */
        $orderServices = app(OrderServices::class);

        /** @var CartServices $cartServices */
        $cartServices = app(CartServices::class);

        return [
            'transaction_id' => $transaction->id,
            'orderData' => $orderServices->getOrderData(),
            'cartDetails' => $cartDetails = $cartServices->cartTotal(),
        ];
    }
}

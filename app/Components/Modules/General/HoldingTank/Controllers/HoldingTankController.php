<?php

namespace App\Components\Modules\General\HoldingTank\Controllers;

use App\Blueprint\Traits\UserDataFilter;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector;
use App\Components\Modules\General\HoldingTank\HoldingTankIndex as Module;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class HoldingTankController
 * @package App\Components\Modules\General\HoldingTank\Controllers
 */
class HoldingTankController extends Controller
{
    use UserDataFilter;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @param BinaryServices $binaryServices
     * @return Factory|View
     */
    function index(BinaryServices $binaryServices)
    {
        $moduleData = $this->module->getModuleData(true);

        if (!$moduleData->get('holding_tank'))
            return view('General.HoldingTank.Views.Partials.suspended', [
                'moduleId' => $this->module->moduleId
            ]);

        $userConfig = HoldingTank::where('user_id', loggedId())->get();
        $data = [
            'title' => _mt($this->module->moduleId, 'HoldingTank.holding_tank'),
            'heading_text' => _mt($this->module->moduleId, 'HoldingTank.holding_tank'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'HoldingTank.holding_tank') => getScope() . ".holdingTank"
            ],
            'scripts' => [asset('global/plugins/bootstrap-toastr/toastr.min.js')],
            'styles' => [
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId,
            'totalHoldingUsers' => User::where('sponsor_id', loggedId())->doesntHave('repodata')->count(),
            "holdingusers"=>User::where('sponsor_id', loggedId())->doesntHave('repodata'),
            'binaryInfo' => $binaryServices->getPoints(collect([
                'userId' => loggedId(),
                'fullStats' => true
            ]))->first(),
            'positions' => BinaryPositionSelector::get(),
            'userConfig' => $userConfig->count() ? $userConfig->first() : [],
        ];


        return view('General.HoldingTank.Views.index', $data);
    }

    /**
     * @param Request $request
     */
    function changeStatus(Request $request)
    {
        $status = $request->input('registerAutomatically');
        $position = $request->input('default_position');

        if(!$position)
        {
            $position = 1;
        }
        HoldingTank::updateOrCreate([
            'user_id' => loggedId()
        ], [
            'status' => $status,
            'default_position' => $position
        ]);
    }

    /**
     * @return Factory|View
     */
    function filter()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
        ];

        return view('General.HoldingTank.Views.Partials.holdingFilter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function fetch(Request $request)
    {
        $moduleData = $this->module->getModuleData(true);
        $userId = $request->input('userId');

        $data = [
            'totalHoldingUsers' => app()->call([$this, 'fetchUserData'], ['userId' => $userId, 'pages' => $request->input('totalToShow', 25)]),
            'moduleId' => $this->module->moduleId,
            'holdingTime' => $moduleData->get('holding_time'),
        ];

        return view('General.HoldingTank.Views.Partials.holdingTable', $data);
    }

    /**
     * @param $userId
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchUserData($userId, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return User::doesntHave('repodata')
            ->when($userId, function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->{$method}($pages);
    }

    /**
     * @param Request $request
     * @param BinaryServices $binaryServices
     * @return bool
     */
    function placeSingleUser(Request $request, BinaryServices $binaryServices)
    {
        $userId = $request->input('userId');
        $position = $request->input('position')?$request->input('position'):1;

        $this->placeUser($userId, $position);

        return response([
            'status' => User::doesntHave('repodata')->count(),
            'binaryInfo' => $binaryServices->getPoints(collect([
                'userId' => loggedId(),
                'fullStats' => true
            ]))->first(),
        ]);
    }

    /**
     * @param $userId
     * @param $position
     */
    function placeUser($userId, $position = 1)
    {
        $user = User::find($userId);

        if(!$position)
        {
            $position = 1;
        }
        if (!$user->sponsor()->repoData) {
            $user->update([
                'is_confirmed' => true,
                'preferred_position' => $position
            ]);
        } else {
            $data = collect([
                'sponsor' => $user->sponsor()->username,
                'placement' => null,
                'position' => $position,
            ]);

            $this->addToRepo($user, $data);

            $referrals = User::where('sponsor_id', $user->id)->where('is_confirmed', true)->get()->pluck('id');
            if ($referrals->count())
                $this->checkChainUsers(collect($referrals));
        }
    }


    /**
     * @param Collection $data
     * @param User $user
     * @return bool
     */
    function addToRepo(User $user, Collection $data)
    {
        $repoData = $this->formatRepoData($data, $user);
        $prepend = defineFilter('appendOrPrepend', [], 'placement', $repoData);
        $user->repoData($repoData, $prepend);

        defineAction('postAddToRepo', 'holdingTank', ['user' => $user]);

        return $user->update(['is_confirmed' => true]);
    }

    /**
     * @param Collection $users
     */
    function checkChainUsers(Collection $users)
    {
        $queueUsers = clone $users;
        foreach ($users as $userId) {
            $user = User::find($userId);
            $this->addToRepo($user, collect([
                'sponsor' => $user->sponsor()->username,
                'placement' => null,
                'position' => $user->preferred_position,
            ]));

            $queueUsers->forget($queueUsers->search($userId));
            $users = User::where('sponsor_id', $user->id)->where('is_confirmed', true)->get()->pluck('id');
            $queueUsers->merge($users);
        }

        if ($queueUsers->count())
            return $this->checkChainUsers($queueUsers);

        return;
    }

    /**
     * @param Request $request
     * @param BinaryServices $binaryServices
     * @return void
     */
    function placeAllUsers(Request $request, BinaryServices $binaryServices)
    {
        //DB::beginTransaction();
        $position = $request->input('position');

        $users = User::doesntHave('repodata')->where('sponsor_id', loggedId())->get();

        if(!$position)
        {
            $position = 1;
        }
        foreach ($users as $user)
            $this->placeUser($user->id, $position);

        return response([
            'holdingUsers' => User::doesntHave('repodata')->where('sponsor_id', loggedId())->count(),
            'binaryInfo' => $binaryServices->getPoints(collect([
                'userId' => loggedId(),
                'fullStats' => true
            ]))->first(),
        ]);

        // DB::rollBack();
    }
}
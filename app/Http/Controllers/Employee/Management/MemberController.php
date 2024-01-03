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

namespace App\Http\Controllers\Employee\Management;

use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


/**
 * Class MemberController
 * @package App\Http\Controllers\Employee\Management
 */
class MemberController extends Controller
{
    /**
     * @param User|null $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(User $user = null)
    {
        $data['user'] = $user->exists ? $user : loggedUser();
        $data['title'] = _t('member.memberManagement');
        $data['styles'] = [
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
        ];
        $data['scripts'] = [
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
        ];
        $data['title'] = _t('member.memberManagement');
        $data['heading_text'] = _t('member.memberManagement');
        $data['breadcrumbs'] = [
            _t('index.home') => 'employee.home',
            _t('member.memberManagement') => 'employee.management.members'
        ];

        return view('Employee.Management.Member.index', $data);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    function requestUnit(Request $request)
    {
        if (!$action = $request->input('unit'))
            return response()->json(['invalid request'], 403);

        defineAction('memberManagement', 'unitAction', $action);

        return defineFilter('memberManagement', method_exists($this, $action) ? app()->call([$this, $action], (array)$request->input('params')) : '', 'unitFilter', $action);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function memberSlice(Request $request)
    {
        if (!$request->input('user'))
            return response()->json(['invalid request !']);

        $data['user'] = User::find($request->input('user'));

        return view('Employee.Management.Member.Partials.slice', $data);
    }

    /**
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @param TransactionServices $transactionServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function wallets(Request $request, ModuleServices $moduleServices, TransactionServices $transactionServices)
    {
        $data['user'] = $user = User::find($request->input('user', loggedId()));
        $data['wallets'] = array_map(function ($instance) use ($transactionServices, $user) {
            /** @var WalletModuleInterface|ModuleBasicAbstract $instance */
            $instance->data = collect([
                'balance' => $instance->getBalance($user),
                'name' => $instance->getRegistry()['name'],
                'cashIn' => [
                    'amount' => $instance->credited($user)->sum('amount'),
                    'txnNos' => $instance->credited($user)->count(),
                    'graph' => $this->graphData($instance->credited($user)),
                ],
                'cashOut' => [
                    'amount' => $instance->debited($user)->sum('amount'),
                    'txnNos' => $instance->debited($user)->count(),
                    'graph' => $this->graphData($instance->debited($user)),
                ],
            ]);
            return $instance;
        }, $moduleServices->getWalletPool());
        //dd($data);
        return view('Employee.Management.Member.Partials.wallets', $data);
    }

    /**
     * @param Builder $query
     * @param string $groupBy
     * @return Collection|Builder|array
     */
    function graphData(Builder $query, $groupBy = 'month')
    {
        /** @var TransactionServices $transactionServices */
        $transactionServices = app(TransactionServices::class);
        $transactionServices->groupBy($query, $groupBy);

        return $query->orderBy('created_at')->get()->map(function ($value) {
            return [
                $value->created_at->format('M-Y'),
                $value->total
            ];
        })->toArray();
    }

    /**
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function commissions(Request $request, ModuleServices $moduleServices)
    {
        $data['user'] = $user = User::find($request->input('user'));
        $data['commissions'] = array_map(function ($module) use ($user, $request) {
            return tap($module, function ($module) use ($user) {
                /** @var CommissionModuleInterface|ModuleBasicAbstract $module */
                $module->data = [
                    'credited' => [
                        'txn' => ($credited = $module->credited($user)) ? $credited->get() : new Collection(),
                        'amount' => $credited ? $credited->sum('amount') : 0,
                        'graph' => json_encode($credited ? $this->graphData($credited) : [])
                    ],
                    'pending' => [
                        'txn' => ($pending = $module->pending($user)) ? $pending->get() : new Collection(),
                        'amount' => $pending ? $pending->sum('amount') : 0,
                        'graph' => json_encode($pending ? $this->graphData($pending) : [])
                    ],
                ];
            });
        }, $moduleServices->getCommissionPool('active'));
        return view('Employee.Management.Member.Partials.commissions', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function profile(Request $request)
    {
        $data = [
            'user' => User::with('repoData.parentUser.repoData', 'repoData.sponsorUser.repoData')
                ->find($request->input('user')),
        ];

        $scripts = array(
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
        );
        $styles = array(
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
        );

        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['countries'] = getCountries();
        $data['states'] = getStates($data['user']->metaData->country_id);
        $data['cities'] = getCities($data['user']->metaData->state_id);

        return view('Employee.Management.Member.Partials.profile', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function userCard(Request $request)
    {
        return view('Employee.Management.Member.Components.memberCard', ['slot' => $request->input('user')]);
    }

    /**
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return bool
     */
    function profileProfile(Request $request, UtilityServices $utilityServices)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pin' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $userInstance = User::find($request->input('userId'));
        $metaInstance = $userInstance->metaData();

        $userInstance->update(collect($request->all())->only(['phone', 'email'])->all());
        $metaInstance->update(collect($request->all())->only(['firstname', 'lastname', 'dob', 'gender', 'address', 'country_id', 'state_id', 'city_id', 'bank_name', 'acc_number', 'pin'])->all());

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'member_profile_updated', 'data' => ['user' => $request->input('userId')],
            'on_user_id' =>$request->input('userId')
        ]);

        return response()->json(['status' => true]);
    }

    /**
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return bool
     */
    function profilePassword(Request $request, UtilityServices $utilityServices)
    {
        if ($validator = Validator::make($request->all(), $this->validationPasswordRules(), $this->validationPasswordMessages())) {
            //$validator->errors();
            //return response()->json(['status' => false, 'message' => $validator->errors()]);
        }
        if ($request->input('password') != $request->input('confirm_password'))
            return response()->json(['status' => false, 'message' => 'Password and confirm password does not match']);

        if ($request->input('password') != $request->input('confirm_password'))
            return response()->json(['status' => false, 'message' => 'Password and confirm password does not match']);

        if ($request->input('password') && Hash::check($request->input('password'), User::find($request->input('userId'))->password)) {
            return response()->json(['status' => false, 'message' => 'Please enter new password different than existing password']);
        }

        User::find($request->input('userId'))->update(['password' => bcrypt($request->input('password'))]);

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'member_password_changed', 'data' => [
                'user' => $request->input('userId'),
            ],
            'on_user_id' => $request->input('userId')
        ]);

        return response()->json(['status' => true]);
    }

    /**
     * @return array
     */
    public function validationPasswordRules()
    {
        return [
            'password' => 'required',
            'confirm_password' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function validationPasswordMessages()
    {
        return [
            'password' => 'Please enter password',
            'confirm_password' => 'Please enter confirm password'
        ];
    }

    /**
     * @param Request $request
     * @return void
     */
    function profileSocial(Request $request)
    {
        $metaInfo = collect($request->all());

        $userInstance = User::find($request->input('userId'));
        $metaInstance = $userInstance->metaData();
        $metaInstance->update($metaInfo->only(['facebook', 'twitter', 'google_plus', 'linked_in', 'about_me'])->all());
        //return response()->json(['status' => true]);
    }

    /**
     * @param Request $request
     * @return void
     */
    function profilePayout(Request $request)
    {
        $metaInfo = collect($request->all());

        $userInstance = User::find($request->input('userId'));
        $metaInstance = $userInstance->metaData();
        $metaInstance->update($metaInfo->only(['bank_name', 'acc_number'])->all());
        //return response()->json(['status' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function personalized(Request $request)
    {
        $data = [
            'user' => User::with('repoData.parentUser.repoData', 'repoData.sponsorUser.repoData')
                ->find($request->input('user')),
        ];

        return view('Employee.Management.Member.Partials.personalized', $data);
    }
}
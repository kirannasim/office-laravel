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

namespace App\Components\Modules\General\ReferralList\Controllers;

use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\ReferralList\ModuleCore\Services\ReferralListServices;
use App\Components\Modules\General\ReferralList\ReferralListIndex as Module;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ReferralListController
 * @package App\Components\Modules\General\ReferralList\Controllers
 */
class ReferralListController extends Controller
{
    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */

    /**
     * @param Request $request
     * @param ReferralListServices $referralListServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function referralGraph(Request $request, ReferralListServices $referralListServices)
    {
        $userID = $request->input('id');
        $data = [];
        $return = $referralListServices->getMonthlyReferralListGraphData($userID);
        $data['referrals'] = $return['formattedGraph'];
        $data['xAxises'] = $return['xAxises'];

        return view('General.ReferralList.Views.Partials.referralGraph', $data);
    }

    function referralList(Request $request, UserServices $userServices)
    {
        $userId = $request->input('id');
        $pages = $request->input('totalToShow', 20);

        $data = [
            'user' => User::with('repoData.parentUser.repoData', 'repoData.sponsorUser.repoData')
                ->find($userId),
        ];

        $data['id'] = $userId;

        $data['downlines'] = $userServices->getUsers(collect([]), '', true,['repoData','rank', 'metaData'])
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->orderBy('created_at', 'desc')
              ->paginate($pages);

        $options = collect([
            'fromDate' => Carbon::now()->toDateString() . ' 00:00:00',
            'toDate' => Carbon::now()->toDateTimeString(),
        ]);
        $data['todayJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();

        $options = collect([
            'fromDate' => Carbon::now()->startOfMonth(),
            'toDate' => Carbon::now()->endOfMonth(),
        ]);
        $data['thisMonthJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();
        $options = collect([
            'fromDate' => Carbon::now()->startOfYear(),
            'toDate' => Carbon::now()->endOfYear(),
        ]);
        $data['thisYearJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();

        $data['moduleId'] = $this->module->moduleId;
        return view('General.ReferralList.Views.Partials.referralList', $data);
    }

    public function myReferral(UserServices $userServices)
    {
        $data['title'] = _mt($this->module->moduleId, 'ReferralList.Referral_List');
        $data['heading_text'] = _mt($this->module->moduleId, 'ReferralList.Referral_List');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'ReferralList.Referral_List') => getScope() . '.ReferralList.list',
            _mt($this->module->moduleId, 'ReferralList.Referral_List') => getScope() . '.ReferralList.list'
        ];
        $data['user'] = loggedUser();
        $userId = loggedUser()->id;
        $data['downlines'] = $userServices->getUsers(collect([]), '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->orderBy('created_at', 'desc')->get();

        $options = collect([
            'fromDate' => Carbon::now()->toDateString() . ' 00:00:00',
            'toDate' => Carbon::now()->toDateTimeString(),
        ]);
        $data['todayJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();

        $options = collect([
            'fromDate' => Carbon::now()->startOfMonth(),
            'toDate' => Carbon::now()->endOfMonth(),
        ]);
        $data['thisMonthJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();
        $options = collect([
            'fromDate' => Carbon::now()->startOfYear(),
            'toDate' => Carbon::now()->endOfYear(),
        ]);
        $data['thisYearJoined'] = $userServices->getUsers($options, '', true)
            ->whereHas('repoData', function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('sponsor_id', $userId);
            })->count();


        return view('General.ReferralList.Views.Partials.myReferral', $data);
    }

}

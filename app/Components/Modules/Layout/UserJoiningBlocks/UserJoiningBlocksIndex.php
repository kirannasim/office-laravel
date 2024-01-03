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

namespace App\Components\Modules\Layout\UserJoiningBlocks;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Query\Builder;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\Layout\UserJoiningBlocks\ModuleCore\Traits\Hooks;
use App\Eloquents\User;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class UserJoiningBlocksIndex
 * @package App\Components\Modules\Layout\UserJoiningBlocks
 */
class UserJoiningBlocksIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks;

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param UserServices $userServices
     * @param OrderServices $orderServices
     * @return Factory|View
     */
    function userDetailedGraph(IndexController $controller, Request $request, UserServices $userServices, OrderServices $orderServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $users = $this->resolveUsers('normal', $options, $userServices);
        $descendants = $this->resolveUsers('descendants', $options, $userServices);
        $packageOrders = $orderServices->getOrders($filters->merge([
            'orderType' => 'package'
        ]));
        $packageGraph = $controller->prepareShortGraphData($packageOrders->get(), $groupBy = $options->get('groupBy'));
        $userGraph = $controller->prepareShortGraphData($users, $groupBy = $options->get('groupBy'));
        $descendantsGraph = $controller->prepareShortGraphData($descendants, $groupBy = $options->get('groupBy'));
        $data = [
            'filterBy' => $options->get('filterBy', 'month'),
            'packageGraph' => $controller->formatToArrayForGraph($packageGraph),
            'userGraph' => $controller->formatToArrayForGraph($userGraph),
            'descendantsGraph' => $controller->formatToArrayForGraph($descendantsGraph),
            'moduleId' => $this->moduleId,
        ];

        return view('Layout.UserJoiningBlocks.Views.userDetailedGraph', $data);
    }

    /**
     * @param $type
     * @param $options
     * @param UserServices $userServices
     * @return Collection
     */
    function resolveUsers($type, $options, UserServices $userServices)
    {
        switch ($type) {
            case 'descendants':
                return loggedUser()->descendants($options)->get();
                break;
            default:
                return $userServices->getUsers($options, '', true)
                    ->whereHas('repoData', function ($query) {
                        /** @var Builder $query */
                        if (strtolower(getScope()) == 'user')
                            $query->where('sponsor_id', loggedId());
                    })->get();
        }
    }

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param UserServices $userServices
     * @return Factory|View
     */
    function dashboardUserJoiningTile(IndexController $controller, Request $request, UserServices $userServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => User::min('created_at'),
            'filterBy' => 'year',
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });

        $type = strtolower(getScope() == 'user') ? 'referral' : 'normal';
        $users = $this->resolveUsers($usersType = $request->input('usersType', $type), $options, $userServices);

        $data = [
            'graph' => $controller->prepareShortGraphData($users, $groupBy = $options->get('groupBy')),
            'total' => $users->sum('total'),
            'filterBy' => $options->get('filterBy', 'month'),
            'grandTotal' => $grandTotal = User::count(),
            'target' => $target = 300,
            'progress' => round((($grandTotal / $target) * 100), 1),
            'usersType' => $usersType,
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ]
        ];

        return view('Layout.UserJoiningBlocks.Views.dashboardTile', $data);
    }

    /**
     * @param Request $request
     * @param UserServices $userServices
     * @return Factory|View
     */
    function userJoinings(Request $request, UserServices $userServices)
    {
        $filters = collect([]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $data = [
            'users' => $userServices->getUsers($options, '', true)
                ->whereHas('repoData', function ($query) {
                    /** @var Builder $query */
                    if (strtolower(getScope()) == 'user')
                        $query->where('sponsor_id', loggedId());
                })->orderBy('created_at', 'desc')->get()->take(7),
            'moduleId' => $this->moduleId
        ];

        return view('Layout.UserJoiningBlocks.Views.userJoinings', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function userInfo(Request $request)
    {
        $data = [
            'user' => User::find($request->input('userId')),
            'moduleId' => $this->moduleId
        ];

        return view('Layout.UserJoiningBlocks.Views.userInfo', $data);
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}
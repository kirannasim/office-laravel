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

namespace App\Components\Modules\Layout\TopEarnersAndTopSponsors;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Query\Builder;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\Layout\TopEarnersAndTopSponsors\ModuleCore\Traits\Hooks;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Throwable;

/**
 * Class DiscountIndex
 * @package App\Components\Modules\Layout\TopEarnersAndTopSponsors
 */
class TopEarnersAndTopSponsorsIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks;

    /**
     * @param Request $request
     * @param UserServices $userServices
     * @return Factory|View
     * @throws Throwable
     */
    function topEarnersAndTopSponsors(Request $request, UserServices $userServices)
    {
        $filters = collect([
            'limit' => 7
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $data = [
            'topSponsors' => $userServices->topSponsors($options),
            'topEarners' => $userServices->topEarners($options),
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ]
        ];

        return view('Layout.TopEarnersAndTopSponsors.Views.topEarnersAndTopSponsors', $data)->render();
    }

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param UserServices $userServices
     * @return Factory|View
     */
    function sponsorInfo(IndexController $controller, Request $request, UserServices $userServices)
    {
        if (!$request->input('userId')) return;

        $filters = collect([
            'groupBy' => 'month',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $user = User::find($request->input('userId'));
        /** @var Builder $downlines */
        $children = $userServices->getUserRepo($options, $user->repoData->applySponsorHierarchy()->children());
        $data = [
            'user' => $user,
            'filterBy' => $options->get('filterBy'),
            'graph' => $controller->formatToArrayForGraph($controller->prepareShortGraphData($children->get(), $options->get('groupBy'))),
            'moduleId' => $this->moduleId,
        ];

        return view('Layout.TopEarnersAndTopSponsors.Views.sponsorInfo', $data);
    }

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param TransactionServices $transactionServices
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function userEarningsInfo(IndexController $controller, Request $request, TransactionServices $transactionServices, ModuleServices $moduleServices)
    {
        if (!$request->input('userId')) return;

        $user = User::find($request->input('userId'));
        $filters = collect([
            'user' => [$user->id, 'payee'],
            'operation' => TransactionOperation::slugToId('commission')
        ]);
        $options = $filters->merge($request->input('filters'));
        $transactions = $transactionServices->getTransactions($options);
        $availableCommissions = $moduleServices->getCommissionPool('active');
        $groupedTransactions = $transactions->get()->groupBy(function ($transaction) {
            /** @var Transaction $transaction */
            if (isset($transaction->commission->module_id))
                return getModule((int)$transaction->commission->module_id)->getRegistry()['key'];
        })->map(function ($group) {
            /** @var Collection $group */
            return $group->sum('amount');
        });
        $nullCommissions = array_filter($availableCommissions, function ($commission) use ($groupedTransactions) {
            /** @var ModuleBasicAbstract $commission */
            return !in_array($commission->getRegistry()['key'], (array)$groupedTransactions->keys()->toArray());
        });
        $data = [
            'user' => $user,
            'transactions' => array_merge($controller->formatToArrayForGraph($groupedTransactions), array_map(function ($commission) {
                /** @var ModuleBasicAbstract $commission */
                return [$commission->getRegistry()['key'], 0];
            }, $nullCommissions)),
            'earnedAmount' => $transactions->get()->sum('amount'),
            'moduleId' => $this->moduleId
        ];

        return view('Layout.TopEarnersAndTopSponsors.Views.userEarningsInfo', $data);
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}
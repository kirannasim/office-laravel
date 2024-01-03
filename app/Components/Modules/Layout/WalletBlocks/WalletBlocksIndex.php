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

namespace App\Components\Modules\Layout\WalletBlocks;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Components\Modules\Layout\WalletBlocks\ModuleCore\Traits\Hooks;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Throwable;

/**
 * Class WalletBlocksIndex
 * @package App\Components\Modules\Layout\WalletBlocks
 */
class WalletBlocksIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks, GraphHelper;

    /**
     * @param ModuleServices $moduleServices
     * @param Request $request
     * @return Factory|View
     * @throws Throwable
     */
    function dashboardWalletTile(ModuleServices $moduleServices, Request $request)
    {
        if (!$walletPool = $moduleServices->getWalletPool('active')) return;

        $wallets = collect($walletPool)->filter(function ($value) {
            /** @var WalletModuleInterface|ModuleBasicAbstract $value * */
            return $value->moduleId != callModule('Wallet-BusinessWallet')->moduleId;
        });
        if (strtolower(getScope()) == 'user' && !$wallets->count()) return;

        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        /** @var WalletModuleInterface $currentWallet */
        $data = [
            'filterBy' => $options->get('filterBy', 'month'),
            'txnType' => $txnType = $request->input('txnType', 'balance'),
            'wallets' => $wallets = collect($walletPool)->filter(function ($value) {
                /** @var WalletModuleInterface|ModuleBasicAbstract $value * */
                return $value->moduleId != callModule('Wallet-BusinessWallet')->moduleId;
            }),
            'currentWallet' => $currentWallet = getModule((int)$request->input('walletId', $wallets->first() ? $wallets->first()->moduleId : null)),
            'walletGraph' => $walletGraph = app()->call([$this, 'prepareWalletGraphData'], [
                'walletModule' => $currentWallet,
                'options' => $options,
                'groupBy' => $options->get('groupBy'),
                'txnType' => $txnType,
            ]),
            'txnAmount' => ($txnType == 'balance') ? $currentWallet->getBalance() : $walletGraph->sum(),
            'grandTotal' => $grandTotal = 100,
            'target' => $target = 300,
            'progress' => round((($grandTotal / $target) * 100), 1),
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ]
        ];

        return view('Layout.WalletBlocks.Views.dashboardTile', $data);
    }

    /**
     * @param IndexController $controller
     * @param WalletModuleInterface $walletModule
     * @param $options
     * @param $groupBy
     * @param string $txnType
     * @return array|Collection
     */
    function prepareWalletGraphData(IndexController $controller, $walletModule = null, $options, $groupBy, $txnType = 'credited')
    {
        /** @var WalletModuleInterface $walletModule */
        if (!$walletModule) return collect([]);

        if ($txnType == 'balance') return app()->call([$this, 'prepareBalanceData'], [
            'walletModule' => $walletModule,
            'options' => $options,
            'groupBy' => $groupBy,
        ]);
        /** @var Builder $regularTransactions */
        $regularTransactions = $walletModule->{$txnType}(loggedUser(), $options);

        return $controller->prepareShortGraphData($regularTransactions->get(), $groupBy);
    }

    /**
     * @param WalletModuleInterface $walletModule
     * @param array $options
     * @param $groupBy
     * @return array
     */
    function prepareBalanceData(WalletModuleInterface $walletModule, $options = [], $groupBy)
    {
        $credited = $this->prepareShortGraphData($walletModule->credited(loggedUser(), $options)->get(), $groupBy);
        $debited = $this->prepareShortGraphData($walletModule->debited(loggedUser(), $options)->get(), $groupBy);
        $groupKeys = $credited->keys()->merge($debited->keys())->unique();
        $dispatch = [];

        foreach ($groupKeys as $key)
            $dispatch[$key] = ($credited->get($key, 0)) - ($debited->get($key, 0));

        return collect($dispatch);
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}
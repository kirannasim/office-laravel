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

namespace App\Components\Modules\General\Payout\ModuleCore\Traits;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Components\Modules\General\Payout\ModuleCore\Support\Transaction\PayoutCallback;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers required hooks
     *
     * @return void
     */
    function hooks()
    {
        registerFilter('dashboardBlock', function ($content) {
            return $content . app()->call([$this, 'dashboardPayoutTile']);
        }, 'dashboardTile', 4);

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'payout') return $content;

            return $content . app()->call([$this, 'detailedPayoutsGraph']);
        }, 'unitFilter');

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);

        app()->call([$this, 'payoutRequest']);

        app()->call([$this, 'payoutRelease']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function detailedPayoutsGraph()
    {
        $data = [];

        return view('General.Payout.Views.DashboardLayout.payoutsGraphNav', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function detailedPayoutsGraphsContent(Request $request)
    {
        $data = [];

        return view('General.Payout.Views.DashboardLayout.payoutsGraphContent', $data);
    }

    /**
     * @param Request $request
     * @param TransactionServices $transactionServices
     * @param IndexController $controller
     * @param ModuleServices $moduleServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    function dashboardPayoutTile(Request $request, TransactionServices $transactionServices, IndexController $controller, ModuleServices $moduleServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'week',
            'operation' => TransactionOperation::slugToId('payout')
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });

        if (getScope() == 'employee') {
            $user = getAdminUser();
        } else {
            $user = loggedUser();
        }


        (getScope() != 'user') ?: $options = $options->merge(['user' => $user]);

        $wallets = collect($moduleServices->getWalletPool('active'))->filter(function ($value) {
            /** @var WalletModuleInterface|ModuleBasicAbstract $value */
            return $value->moduleId != callModule('Wallet-BusinessWallet')->moduleId;
        });
        $options = $options->merge(['wallet' => (int)$request->input('walletId', $wallets->first()->moduleId)]);
        $payouts = $transactionServices->getTransactions($options);
        $data = [
            'filterBy' => $filterBy = $request->input('filterBy', 'week'),
            'wallets' => $wallets,
            'currentWallet' => $currentWallet = getModule((int)$request->input('walletId', $wallets->first()->moduleId)),
            'payoutGraph' => $payoutGraph = $controller->prepareShortGraphData($payouts->get(), $groupBy = $options->get('groupBy')),
            'total' => $payoutGraph->sum(),
            'grandTotal' => $payoutGraph->sum(),
            'progress' => 100,
            'target' => 5000,
            'scope' => getScope(),
            'moduleId' => $this->moduleId
        ];

        return view('General.Payout.Views.DashboardLayout.payoutTile', $data)->render();
    }

    /**
     * @param MenuServices $menuServices
     */
    public function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => ['en' => 'Withdrawal', 'es' => 'Retirada', 'ru' => 'Вывод', 'ko' => '철수', 'pt' => 'retirada', 'ja' => '脱退', 'zh' => '退出'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.payout',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-euro-sign',
                    'parent_id' => '',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '5',
                    'protected' => '0',
                    'description' => 'Payout - Admin'
                ],
                // [
                //   'label' => ['en' => 'Withdrawal', 'es' => 'Retirada', 'ru' => 'Вывод', 'ko' => '철수', 'pt' => 'retirada', 'ja' => '脱退', 'zh' => '退出'],
                //     'link' => '',
                //     'route' => '',
                //     'route_name' => 'user.withdraw',
                //     'icon_image' => '',
                //     'icon_font' => 'fas fa-euro-sign',
                //     'parent_id' => '',
                //     'permit' => ['user:defaultUser'],
                //     'sort_order' => '11',
                //     'protected' => '0',
                //     'description' => 'Payout - Admin'  
                // ],
                // [
                //     'label' => ['en' => 'Withdrawal', 'es' => 'Retirada', 'ru' => 'Вывод', 'ko' => '철수', 'pt' => 'retirada', 'ja' => '脱退', 'zh' => '退出'],
                //     'link' => '',
                //     'route' => '',
                //     'route_name' => 'user.payout',
                //     'icon_image' => '',
                //     'icon_font' => 'fas fa-euro-sign',
                //     'parent_id' => '',
                //     'permit' => ['user:defaultUser'],
                //     'sort_order' => '11',
                //     'protected' => '0',
                //     'description' => 'Payout - User'
                // ],
                [
                    'label' => ['en' => 'Payout Released', 'es' => 'Pago liberado', 'ru' => 'Выплата выпущена', 'ko' => '배당 지급', 'pt' => 'Pagamento liberado', 'ja' => '支払いが解除されました', 'zh' => '付款已发布'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.payout.report.Released',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin', 'admin:adminDemo'],
                    'sort_order' => '10',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            // PayoutRequest::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }

    /**
     * @param PaymentServices $paymentServices
     * @param PayoutCallback $payoutCallback
     */
    function payoutRequest(PaymentServices $paymentServices, PayoutCallback $payoutCallback)
    {
        registerAction('prePaymentProcessAction', function ($request) use ($payoutCallback, $paymentServices) {
            $paymentServices->setCallback($payoutCallback)
                ->setGateway((int)$request->input('gateway'))
                ->setPayable($this->preparePayoutRequestPayable($request, $paymentServices))
                ->setIsPayout(true);
        }, 'payout', 1);
    }

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return array
     */
    function preparePayoutRequestPayable(Request $request, PaymentServices $paymentServices)
    {
        $attributes = [
            'payer' => loggedUser(),
            'payee' => loggedUser(),
            'context' => 'payout',
            'actualAmount' => $actualAmount = $request->input('request_amount'),
            'total' => bcadd(collectiveAmount($charges = collect(defineFilter('transactionCharge', [], 'payout', ['amount' => $actualAmount]))), $actualAmount, 8),
            'remarks' => $request->input('remarks', ''),
            'operation' => 'payout',
            'fromModule' => $request->input('wallet'),
            'toModule' => (int)$request->input('gateway'),
            'gateway' => getModule((int)$request->input('gateway')),
            'charges' => $charges->toArray(),
        ];

        $payable = $paymentServices->preparePayable($attributes);

        return $payable;
    }

    /**
     * @param PaymentServices $paymentServices
     * @param PayoutCallback $payoutCallback
     */
    function payoutRelease(PaymentServices $paymentServices, PayoutCallback $payoutCallback)
    {
        registerAction('prePaymentProcessAction', function ($request) use ($payoutCallback, $paymentServices) {
            if (!session('payout-verified')) return;

            session_unset('payout-verified');

            $paymentServices->setCallback($payoutCallback)
                ->setGateway((int)$request->input('gateway'))
                ->setPayable($this->prepareManualReleasePayable($request, $paymentServices))
                ->setIsPayout(true);
        }, 'manualPayoutRelease', 1);
    }

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return array
     */
    function prepareManualReleasePayable(Request $request, PaymentServices $paymentServices)
    {
        $payables = [];

        foreach ($request->input('payout') as $userId => $actualAmount) {
            $attributes = [
                'payer' => User::find($userId),
                'payee' => User::find($userId),
                'context' => 'manualPayoutRelease',
                'actualAmount' => $actualAmount,
                'total' => $actualAmount + array_sum(array_column($charges = defineFilter('transactionCharge', [], 'payout', $actualAmount), 'amount')),
                'remarks' => 'Manual admin payout release',
                'operation' => 'payout',
                'fromModule' => (int)$request->input('wallet'),
                'toModule' => (int)$request->input('wallet'),
                'gateway' => getModule((int)$request->input('gateway')),
                'charges' => $charges,
            ];

            $payables[] = $paymentServices->preparePayable($attributes);
        }

        return $payables;
    }
}

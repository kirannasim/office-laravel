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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Support\TransferCallback;
use App\Eloquents\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Throwable;


/**
 * Trait Hooks
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits
 */
trait Hooks
{
    use GraphHelper;

    /**
     * @return void
     */
    function hooks()
    {
        registerFilter('dashboardBlock', function ($content) {
            return $content . app()->call([$this, 'dashboardBusinessBlock']);
        }, 'dashboardTile', 3);

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'prePayment']);
    }

    /**
     * @param Request $request
     * @param TransactionServices $transactionServices
     * @return Factory|View
     * @throws Throwable
     */
    function dashboardBusinessBlock(Request $request, TransactionServices $transactionServices)
    {
        if (strtolower(getScope()) != 'admin') return;

        $filters = collect([
            'groupBy' => 'month',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);

        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });

        $txnAction = $request->input('txnAction', 'balance');
        $data = [
            'txnType' => $txnAction,
            'target' => $target = 5000,
            'balance' => $balance = $this->getBalance(),
            'graph' => $walletGraph = app()->call([$this, 'prepareWalletGraphData'], [
                'walletModule' => $this,
                'options' => $options,
                'groupBy' => $options->get('groupBy'),
                'txnType' => $txnAction,
            ]),
            'total' => ($txnAction == 'balance') ? $this->getBalance() : $walletGraph->sum(),
            'progress' => round((($balance / $target) * 100), 1),
            'filterBy' => $options->get('filterBy', 'month'),
        ];

        return view('Wallet.BusinessWallet.Views.Partials.dashboardBlock', $data)->render();
    }

    /**
     * @param $options
     * @param $groupBy
     * @param string $txnType
     * @return array|Collection
     */
    function prepareWalletGraphData($options, $groupBy, $txnType = 'credited')
    {
        if ($txnType == 'balance') return app()->call([$this, 'prepareBalanceData'], [
            'walletModule' => $this,
            'options' => $options,
            'groupBy' => $groupBy,
        ]);
        /** @var Builder $regularTransactions */
        $regularTransactions = $this->{$txnType}(companyUser(), $options);

        return $this->prepareShortGraphData($regularTransactions->get(), $groupBy);
    }

    /**
     * @param array $options
     * @param $groupBy
     * @return array
     */
    function prepareBalanceData($options = [], $groupBy)
    {
        $credited = $this->prepareShortGraphData($this->credited(companyUser(), $options)->get(), $groupBy);
        $debited = $this->prepareShortGraphData($this->debited(companyUser(), $options)->get(), $groupBy);
        $groupKeys = $credited->keys()->merge($debited->keys())->unique();
        $dispatch = [];

        foreach ($groupKeys as $key)
            $dispatch[$key] = ($credited->get($key, 0)) - ($debited->get($key, 0));

        return collect($dispatch);
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
                    'label' => ['en' => 'Business Wallet', 'es' => 'Billetera de negocios', 'ru' => 'Бизнес-Кошелек', 'ko' => '비즈니스 월렛', 'pt' => 'Negócios De Carteira', 'ja' => 'ビジネス財布', 'zh' => '商业钱包', 'vi' => 'Ví doanh nghiệp', 'sw' => 'Biashara ya Mkoba', 'hi' => 'बिजनेस वॉलेट', 'fr' => 'Portefeuille d\'affaires', 'it' => 'Portafoglio aziendale'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'businesswallet',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-briefcase',
                    'parent_id' => 'wallets',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '1',
                    'protected' => '0',
                    'description' => ''
                ]
            ]));
        });
    }

    /**
     * @param PaymentServices $paymentServices
     * @param TransferCallback $transferCallback
     */
    function prePayment(PaymentServices $paymentServices, TransferCallback $transferCallback)
    {
        registerAction('prePaymentProcessAction', function ($request) use ($transferCallback, $paymentServices) {
            /** @var Request $request */
            if ($request->input('wallet') != $this->moduleId)
                return;
            $paymentServices->setGateway((int)$request->input('gateway'))
                ->setCallback($transferCallback)
                ->setPayable($this->prepareDepositPayable($request, $paymentServices));
        }, 'deposit', 2);

        registerAction('prePaymentProcessAction', function ($request) use ($transferCallback, $paymentServices) {
            /** @var Request $request */
            if ($request->input('wallet') != $this->moduleId)
                return;

            $paymentServices->setGateway((int)$request->input('gateway'))
                ->setCallback($transferCallback)
                ->setPayable($this->prepareDeductPayable($request, $paymentServices));
        }, 'deduct', 2);

        registerAction('prePaymentProcessAction', function ($request) use ($transferCallback, $paymentServices) {
            /** @var Request $request */
            if ($request->input('wallet') != $this->moduleId)
                return;

            $paymentServices->setGateway((int)$request->input('gateway'))
                ->setCallback($transferCallback)
                ->setPayable($this->prepareTransferPayable($request, $paymentServices));
        }, 'transfer', 2);
    }

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return Payable
     */
    function prepareDepositPayable(Request $request, PaymentServices $paymentServices)
    {
        $attributes = [
            'payer' => User::companyUser(),
            'payee' => User::companyUser(),
            'context' => 'Deposit',
            'actualAmount' => $actualAmount = $request->input('amount'),
            'total' => $actualAmount,
            'remarks' => $request->input('remarks'),
            'operation' => 'deposit',
            'fromModule' => callModule('Wallet-BusinessWallet')->moduleId,
            'toModule' => callModule('Wallet-BusinessWallet')->moduleId,
            'gateway' => getModule((int)$request->input('gateway')),
            'charges' => [],
        ];

        $payable = $paymentServices->preparePayable($attributes);

        return $payable;
    }

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return array
     */
    function prepareDeductPayable(Request $request, PaymentServices $paymentServices)
    {
        $payables = [];

        foreach ($request->input('payer') as $each) {
            $attributes = [
                'payer' => User::find($each['id']),
                'payee' => User::companyUser(),
                'context' => 'deduct',
                'actualAmount' => $actualAmount = $each['amount'],
                'total' => $actualAmount,
                'remarks' => $request->input('remarks'),
                'operation' => 'deduct',
                'fromModule' => $each['from_wallet'],
                'toModule' => callModule('Wallet-BusinessWallet')->moduleId,
                'gateway' => getModule((int)$request->input('gateway')),
                'charges' => [],
            ];

            $payables[] = $paymentServices->preparePayable($attributes);
        }

        return $payables;
    }

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return array
     */
    function prepareTransferPayable(Request $request, PaymentServices $paymentServices)
    {
        $payables = [];

        foreach ($request->input('payee') as $each) {
            $attributes = [
                'payer' => companyUser(),
                'payee' => User::find($each['id']),
                'context' => 'Fund Transfer',
                'actualAmount' => $actualAmount = $each['amount'],
                'total' => $actualAmount,
                'remarks' => $request->input('remarks'),
                'operation' => 'fund_transfer',
                'fromModule' => callModule('Wallet-BusinessWallet')->moduleId,
                'toModule' => $each['to_wallet'],
                'gateway' => getModule((int)$request->input('gateway')),
                'charges' => [],
            ];

            $payables[] = $paymentServices->preparePayable($attributes);
        }

        return $payables;
    }
}

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

namespace App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\UtilityServices;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Support\TransferCallback;
use App\Eloquents\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers hooks
     */
    function hooks()
    {
        app()->call([$this, 'addActivity']);

        app()->call([$this, 'addUser']);

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'prePayment']);

        app()->call([$this, 'systemRefresh']);
    }

    /**
     * @param Request $request
     * @param UtilityServices $utilityServices
     */
    function addActivity(Request $request, UtilityServices $utilityServices)
    {

        registerAction('postTransferActions', function ($data) use ($request, $utilityServices) {
            $data = ['gateway' => $request->input('gateway'), 'payee' => $request->input('payee')];

            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'fund_transfer', 'data' => $data,'on_user_id'=>loggedId()]);
        }, 'fund_transfer', 0);
    }

    /**
     * add user to ewallet
     */
    function addUser()
    {
        registerAction('postAddUser', function ($data) {
            /** @var Collection $data */
            return $this->addUserToWallet($data->get('result'));
        }, 'registration', 1);
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
                    'label' => ['en' => 'E-wallet', 'es' => 'Monedero electronico', 'ru' => 'E-кошелек', 'ko' => '전자 지갑', 'pt' => 'Carteira eletrônica', 'ja' => '電子財布', 'zh' => '电子钱包', 'vi' => 'Ví điện tử', 'sw' => 'E-mkoba', 'hi' => 'ई-बटुआ', 'fr' => 'Portefeuille électronique', 'it' => 'E-wallet'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.ewallet',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-cc-jcb',
                    'parent_id' => 'wallets',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '2',
                    'protected' => '0',
                    'description' => 'E-wallet - Admin'
                ],
                [
                    'label' => ['en' => 'Wallet', 'es' => 'Monedero electronico', 'ru' => 'E-кошелек', 'ko' => '전자 지갑', 'pt' => 'Carteira eletrônica', 'ja' => '電子財布', 'zh' => '电子钱包', 'vi' => 'Ví điện tử', 'sw' => 'E-mkoba', 'hi' => 'ई-बटुआ', 'fr' => 'Portefeuille électronique', 'it' => 'E-wallet'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.ewallet',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-wallet',
                    'parent_id' => '',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '13',
                    'protected' => '0',
                    'description' => 'E-wallet - User'
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
                ->setPayable($this->prepareTransferPayable($request, $paymentServices));
        }, 'transfer', 2);
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
                'payer' => User::find(loggedId()),
                'payee' => User::find($each['id']),
                'context' => 'Fund Transfer',
                'fromModule' => $each['wallet'] = callModule('Wallet-Ewallet')->moduleId,
                'toModule' => $each['to_wallet'],
                'actualAmount' => $actualAmount = $each['amount'],
                'total' => $actualAmount + array_sum(array_column($charges = defineFilter('PreWalletTransaction', [], 'transactionTotal', $each), 'amount')),
                'remarks' => $request->input('remarks'),
                'operation' => 'fund_transfer',
                'gateway' => getModule((int)$request->input('gateway')),
                'charges' => $charges,
            ];

            $payables[] = $paymentServices->preparePayable($attributes);
        }

        return $payables;
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            Ewallet::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {
            Ewallet::insert([
                "user_id" => 2,
                "transaction_password" => bcrypt('12345678'),
                "status" => 1,
                "ip_status" => 0,
            ]);
        }, 'systemRefresh');
    }
}
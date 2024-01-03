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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Services;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Wallet\BusinessWallet\BusinessWalletIndex;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Eloquents\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class BusinessWalletServices
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Services
 */
class BusinessWalletServices
{
    protected $module;

    /**
     * BusinessWalletServices constructor.
     */
    function __construct()
    {
        $this->module = app(BusinessWalletIndex::class);
    }

    /**
     * @param User $payee
     * @param User $payer
     * @param $amount
     * @param null $remarks
     * @param $actualAmount
     * @param $fromWallet
     * @param $toWallet
     * @param ModuleServices $moduleServices
     * @return TransactionServices|Transaction|string
     */
    function deposit(User $payee, User $payer, $amount, $remarks, $actualAmount, $fromWallet, $toWallet, ModuleServices $moduleServices)
    {
        $gateway = $moduleServices->callModule('Payment-BusinessWallet');
        $attributes = [
            'payee' => $payee,
            'payer' => $payer,
            'gateway' => $gateway,
            'context' => 'Deposit',
            'actual_amount' => $actualAmount
        ];

        $payable = New Payable($attributes);
        $payable->setTotal($amount);

        $args = [
            'payable' => $payable,
            'amount' => $amount,
            'remarks' => $remarks,
            'fromWallet' => $fromWallet,
            'toWallet' => $toWallet
        ];
        $result = app()->call([$gateway, 'processDeposit'], ['args' => $args]);

        return $result['status'];
    }

    /**
     * @param User $payee
     * @param User $payer
     * @param $amount
     * @param null $remarks
     * @param $actualAmount
     * @param $fromWallet
     * @param $toWallet
     * @param ModuleServices $moduleServices
     * @return TransactionServices|Transaction|string
     */
    function transfer(User $payee, User $payer, $amount, $remarks = null, $actualAmount, $fromWallet, $toWallet, ModuleServices $moduleServices)
    {
        $gateway = $moduleServices->callModule('Payment-BusinessWallet');
        $attributes = [
            'payee' => $payee,
            'payer' => $payer,
            'gateway' => $gateway,
            'context' => 'Fund Transfer',
            'actual_amount' => $actualAmount
        ];
        $payable = New Payable($attributes);
        $payable->setTotal($amount);
        $args = [
            'payable' => $payable,
            'remarks' => $remarks,
            'fromWallet' => $fromWallet,
            'toWallet' => $toWallet,
        ];
        $result = app()->call([$gateway, 'processPayment'], ['args' => $args]);

        return $result['transaction'];
    }

    /**
     * @param User $payee
     * @param User $payer
     * @param $amount
     * @param null $remarks
     * @param $actualAmount
     * @param $fromWallet
     * @param $toWallet
     * @param ModuleServices $moduleServices
     * @return mixed
     */
    function deduct(User $payee, User $payer, $amount, $remarks = null, $actualAmount, $fromWallet, $toWallet, ModuleServices $moduleServices)
    {
        $gateway = $moduleServices->callModule('Payment-BusinessWallet');
        $attributes = [
            'payee' => $payee,
            'payer' => $payer,
            'gateway' => $gateway,
            'context' => 'Deduct Fund',
            'actual_amount' => $actualAmount
        ];
        $payable = New Payable($attributes);
        $payable->setTotal($amount);
        $args = [
            'payable' => $payable,
            'remarks' => $remarks,
            'toWallet' => $toWallet,
            'fromWallet' => $fromWallet
        ];
        $result = app()->call([$gateway, 'processDeduct'], ['args' => $args]);

        return $result['transaction'];
    }

    /**
     * check whether transaction password is valid not
     *
     * @param Request $request
     * @param null $transactionPassword
     * @return bool
     */
    function checkTransactionPassword(Request $request, $transactionPassword = null)
    {
        $transactionPassword = $request->input('transactionPass', $transactionPassword);
        $module = callModule('Wallet-BusinessWallet');
        $moduleData = $module->getModuleData();
        $databasePassword = $moduleData['transaction_password'];

        if ($transactionPassword && Hash::check($transactionPassword, $databasePassword))
            return true;

        return false;
    }

    /**
     * @param bool $builderOnly
     * @param \Illuminate\Support\Collection $options
     * @return Transaction|Builder|\Illuminate\Support\Collection|Collection
     */
    function getExtraIncome(\Illuminate\Support\Collection $options, $builderOnly = false)
    {
        $defaults = collect([
            'user' => [
                [companyUser()->id, 'payee', '<>'],
                [companyUser()->id, 'payer', '<>'],
            ]
        ]);
        /** @var TransactionServices $transactionService */
        $transactionService = app(TransactionServices::class);
        $transactions = $transactionService->getTransactions($options = $defaults->merge($options))
            ->where(function ($query) {
                $query->has('charges')->orHas('order.totals');
            });

        if ($builderOnly) return $transactions;

        return $transactions->get()->map(function ($value) use ($transactionService) {
            /** @var Transaction $value */
            $value->setAttribute('belongsToExtraIncome', true);

            return $transactionService->bindExtraAttributes($value, $this->module, companyUser());
        });
    }

    /**
     * @param User $user
     * @param ModuleBasicAbstract|WalletModuleInterface $wallet
     * @return mixed
     */
    function balanceByWallet(User $user, ModuleBasicAbstract $wallet)
    {
        return $wallet->getBalance($user, false);
    }
}
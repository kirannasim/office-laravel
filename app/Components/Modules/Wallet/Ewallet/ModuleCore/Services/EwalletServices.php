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

namespace App\Components\Modules\Wallet\Ewallet\ModuleCore\Services;

use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\User;
use App\Eloquents\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class EwalletServices
 * @package App\Components\Modules\Wallet\Ewallet\ModuleCore\Services
 */
class EwalletServices
{
    /**
     * @param User $payee
     * @param User $payer
     * @param $amount
     * @param null $remarks
     * @param $actualAmount
     * @param $toWallet
     * @param ModuleServices $moduleServices
     * @return TransactionServices|Transaction|string
     */
    function transfer(User $payee, User $payer, $amount, $remarks = null, $actualAmount, $toWallet, ModuleServices $moduleServices)
    {
        $gateway = $moduleServices->callModule('Payment-Ewallet');
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
            'toWallet' => $toWallet
        ];
        $result = app()->call([$gateway, 'processPayment'], ['args' => $args]);

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

        if ($transactionPassword && Hash::check($transactionPassword, User::find(loggedId())->walletData->transaction_password)) return true;

        return false;
    }
}
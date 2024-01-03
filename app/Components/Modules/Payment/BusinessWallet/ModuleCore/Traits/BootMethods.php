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

namespace App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits;

use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use Illuminate\Support\Facades\Gate;


/**
 * Trait BootMethods
 *
 * @package App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits
 */
trait BootMethods
{
    /**
     * Boot Methods
     * @param PaymentServices $paymentServices
     */
    function bootMethods(PaymentServices $paymentServices)
    {
        $this->setWallet(callModule('Wallet-BusinessWallet'));

        Gate::define('businesswalletTransaction', function () use ($paymentServices) {
            app()->call([$this, 'checkTransactionPassword']);
            return $paymentServices->isAuthorized();
        });
    }
}

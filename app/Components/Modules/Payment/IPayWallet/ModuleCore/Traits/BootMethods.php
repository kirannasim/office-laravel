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

/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 1/24/2018
 * Time: 3:33 PM
 */

namespace App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits;

use App\Blueprint\Services\PaymentServices;
use Illuminate\Support\Facades\Gate;


/**
 * Trait BootMethods
 *
 * @package App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits
 */
trait BootMethods
{
    /**
     * Boot Methods
     * @param PaymentServices $paymentServices
     */
    function bootMethods(PaymentServices $paymentServices)
    {
        $this->setWallet(callModule('Wallet-IPayWallet'));

        Gate::define('IPayWalletTransaction', function () use ($paymentServices) {
            app()->call([$this, 'checkTransactionPassword']);
            return $paymentServices->isAuthorized();
        });
    }
}

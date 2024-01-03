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

namespace App\Components\Modules\Payment\Freejoin\ModuleCore\Traits;

use App\Blueprint\Services\PaymentServices;
use Illuminate\Http\Request;


/**
 * Trait Hooks
 * @package App\Components\Modules\Payment\Freejoin\Traits\ModuleCore
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        return app()->call([$this, 'registerHooks']);
    }

    /**
     * Register hooks
     *
     * @param PaymentServices $paymentServices
     * @return Void
     */
    public function registerHooks(PaymentServices $paymentServices)
    {
        registerAction('prePaymentProcessAction', function ($request) use ($paymentServices) {
            /** @var Request $request */
            if ($request->input('gateway') != $this->moduleId)
                return;

            $paymentServices->getPayable()->nullTotal();
            $paymentServices->setAuthorized(true);
        }, 'root', 10);
    }
}

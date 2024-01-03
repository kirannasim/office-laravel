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
 * Time: 3:24 PM
 */

namespace App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleInterface;
use App\Blueprint\Services\PaymentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


/**
 * Class Hooks
 * @package App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits
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

            if (!$this->hasSufficientBalance($paymentServices->totalPayable()))
                PaymentServices::setError('Insufficient fund !', 422);

            session(['paymentData' => $request->all()]);
        }, 'root', 10);

        registerFilter('paymentResponse', function ($response) {
            /** @var Collection $response */
            /** @var PaymentModuleInterface|ModuleBasicAbstract $gateway */
            $response = is_array($response) ? collect($response) : $response;

            if (($gateway = $response->get('gateway')) && ($gateway->moduleId != $this->moduleId)) return $response;

            return $response->merge(
                ['balance' => callModule('Wallet-IPayWallet', 'getBalance')]
            );
        });
    }
}

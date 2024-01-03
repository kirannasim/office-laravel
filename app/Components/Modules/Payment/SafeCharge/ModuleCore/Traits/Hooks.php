<?php

namespace App\Components\Modules\Payment\SafeCharge\ModuleCore\Traits;

use App\Blueprint\Services\PaymentServices;

/**
 * Trait Hooks
 * @package App\Components\Modules\Payment\B2BPay\Traits
 */
trait Hooks
{

    function hooks()
    {
        return app()->call([$this, 'registerHooks']);
    }

    public function registerHooks(PaymentServices $paymentServices)
    {

        registerAction('prePaymentProcessAction', function ($request) use ($paymentServices) {
            /** @var Request $request */
            if ($request->input('gateway') != $this->moduleId)
                return;
            $paymentServices->setAuthorized(true);
        }, 'root', 10);

    }

}
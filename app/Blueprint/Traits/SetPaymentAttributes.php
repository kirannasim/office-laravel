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
 * User: fayis
 * Date: 9/9/2017
 * Time: 10:50 PM
 */

namespace App\Blueprint\Traits;


use App\Blueprint\Interfaces\Module\PaymentModuleInterface;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Support\Transaction\Callback;

/**
 * Trait SetPaymentAttributes
 * @package App\Blueprint\Traits
 */
trait SetPaymentAttributes
{
    /**
     * Set gateway from session
     *
     * @return $this
     */
    protected function setAttributesFromSession()
    {
        $sessionData = PaymentServices::getSessionData();

        if (!is_a($this, PaymentModuleInterface::class))
            $this->setGateway(isset($sessionData['gateway']) ? PaymentServices::gatewayFromSlugOrId($sessionData['gateway']) : '');

        if (!is_a($this, Callback::class))
            $this->setCallback(isset($sessionData['callback']) ? app()->make($sessionData['callback']) : '');

        return $this;
    }
}

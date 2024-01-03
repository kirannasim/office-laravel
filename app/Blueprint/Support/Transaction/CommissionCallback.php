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

namespace App\Blueprint\Support\Transaction;

/**
 * Class RegistrationCallback
 * @package App\Blueprint\Support\Transaction
 */
class CommissionCallback extends Callback
{
    /**
     * Success callback
     *
     * @param $response
     * @return array
     */
    function success($response)
    {
        return $response['transaction'];
    }

    /**
     * Payment failure callback
     *
     * @param array $data failure data
     * @return bool data regarding failure of payment
     */
    function failure($data)
    {
        return false;
    }
}

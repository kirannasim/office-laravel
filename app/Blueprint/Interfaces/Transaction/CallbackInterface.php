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
 * User: Hybrid MLM Software
 * Date: 9/5/2017
 * Time: 10:48 PM
 */

namespace App\Blueprint\Interfaces\Transaction;


/**
 * Interface CallbackInterface
 * @package App\Blueprint\Interfaces\Transaction
 */
interface CallbackInterface
{
    /**
     * Success callback
     *
     * @return mixed
     */
    function success();
}

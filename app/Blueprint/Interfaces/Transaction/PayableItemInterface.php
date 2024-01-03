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
 * Date: 9/3/2017
 * Time: 12:16 PM
 */

namespace App\Blueprint\Interfaces\Transaction;


/**
 * Interface PayableItemInterface
 * @package App\Blueprint\Interfaces\Transaction
 */
interface PayableItemInterface
{
    /**
     * Get Price
     *
     * @return mixed
     */
    function getPrice();

    /**
     * Get Name
     *
     * @return mixed
     */
    function getName();
}

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

namespace App\Blueprint\Interfaces\Module;


/**
 * Interface CartTotalInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface CartTotalInterface
{

    /**
     * @return mixed
     */
    function cartTotal();

    /**
     * @return mixed
     */
    function operationType();
}

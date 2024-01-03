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
 * Time: 4:35 PM
 */

namespace App\Blueprint\Interfaces\Mail;


/**
 * Interface WithSetData
 * @package App\Blueprint\Interfaces\Mail
 */
interface WithSetData
{
    /**
     * @param array $data
     * @return mixed
     */
    function setData($data = []);
}

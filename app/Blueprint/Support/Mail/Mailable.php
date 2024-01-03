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
 * Time: 4:38 PM
 */

namespace App\Blueprint\Support\Mail;

use App\Blueprint\Interfaces\Mail\WithSetData;

/**
 * Class Mailable
 * @package App\Blueprint\Support\Mail
 */
class Mailable extends \Illuminate\Mail\Mailable implements WithSetData
{
    protected $data;

    /**
     * Set Data
     *
     * @param array $data
     * @return $this
     */
    public function setData($data = [])
    {
        $this->data = $data;

        return $this;
    }
}

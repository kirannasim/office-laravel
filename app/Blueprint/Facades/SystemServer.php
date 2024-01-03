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
 * Date: 7/31/2017
 * Time: 9:45 PM
 */

namespace App\Blueprint\Facades;

use App\Blueprint\Services\SystemServices;
use Illuminate\Support\Facades\Facade;

/**
 * Class SystemServer
 * @package App\Blueprint\Facades
 */
class SystemServer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SystemServices::class;
    }
}

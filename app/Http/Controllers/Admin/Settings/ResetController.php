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

namespace App\Http\Controllers\Admin\Settings;

use App\Blueprint\Facades\ResetServer;
use App\Http\Controllers\Controller;

/**
 * Class ResetController
 * @package App\Http\Controllers\Admin\Settings
 */
class ResetController extends Controller
{
    /**reset the blueprint
     *
     */
    function reset()
    {
        ResetServer::resetBlueprint();
    }
}

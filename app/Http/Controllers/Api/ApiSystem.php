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
 * Time: 8:26 PM
 */

namespace App\Http\Controllers\Api;

use App\Blueprint\Facades\SystemServer;

/**
 * Class ApiSystem
 * @package App\Http\Controllers\Api
 */
class ApiSystem extends ApiAbstract
{
    /**
     * Flush Cache
     *
     * @param string $index
     * @return mixed
     */
    function clearCache($index = '')
    {
        SystemServer::clearCache($index);
        return response()->json(['status' => true]);
    }

    /**
     * System Cleanup
     *
     * @return mixed
     */
    function systemCleanup()
    {
        return SystemServer::cleanup();
    }
}
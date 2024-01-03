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

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ApiAbstract
 * @package App\Http\Controllers\Api
 */
abstract class ApiAbstract extends Controller
{
    /**
     * Api request router
     *
     * @param Request $request
     * @return JsonResponse|mixed
     */
    function index(Request $request)
    {
        $action = $request->input('action');
        $data   = $request->input('data');

        if (method_exists($this, $action)) return app()->call([$this, $action], ['param' => $data]);

        return response()->json(['error' => 'Invalid Request !!!']);
    }
}
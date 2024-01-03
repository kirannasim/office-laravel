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

namespace App\Http\Controllers\Admin\Security;

use App\Blueprint\Facades\ConfigServer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * Class SecurityController
 * @package App\Http\Controllers\Admin
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return bool
     */
    function validatePin(Request $request)
    {
        if (static::verifyNonce($request->input('action'), $request->input('nonce')) && Hash::check($request->input('pin'), ConfigServer::getConfigData('security', 'pin')))
            return $request->ajax() ? response()->json(['status' => true]) : true;

        return $request->ajax() ? response()->json(['status' => false], 403) : false;
    }

    /**
     * @param $action
     * @param $nonce
     * @return mixed
     */
    static function verifyNonce($action, $nonce)
    {
        $sessionNonce = session("$action-nonce");

        static::generateActionNonce($action);

        if ($sessionNonce != $nonce) return false;

        session(["$action-verified" => true]);

        return true;
    }

    /**
     * @param $action
     * @return mixed
     */
    static function generateActionNonce($action)
    {
        return tap($nonce = randomString(20), function ($nonce) use ($action) {
            session(["$action-nonce" => $nonce]);
        });
    }
}
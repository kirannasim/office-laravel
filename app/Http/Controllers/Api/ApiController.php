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

use Illuminate\Support\Facades\Auth;

/**
 * Class ApiController
 * @package App\Http\Controllers\Api
 */
class ApiController extends ApiAbstract
{
    public function __construct()
    {
        $this->content = array();
    }

    public function Apilogin()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::user();

            $this->content['token'] = $user->createToken('easyAudit')->accessToken;

        } else {
            $this->content['error'] = "Unauthorised";
        }
        return response()->json($this->content, 200);
    }
}
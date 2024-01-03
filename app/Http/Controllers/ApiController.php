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

namespace App\Http\Controllers;

use App\Eloquents\Config;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class InformationController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Config[]|Collection
     */
    public function getSystemInfo()
    {
        return Config::where('group', 'company_information')->get()->keyBy('meta_key');
    }

    /**
     * @param Request $request
     * @return UserMeta|Model|null
     */
    public function getUserInfo(Request $request)
    {
        return User::with('metaData')->find(idFromUsername($request->input('user')));;
    }

    
}

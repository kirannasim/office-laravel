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

namespace App\Http\Controllers\Misc;

use App\Eloquents\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


/**
 * Class LoginAsUserController
 * @package App\Http\Controllers\Misc
 */
class LoginAsUserController
{
    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function loginAsUser(User $user, Request $request)
    {
        $user = User::find(3);
        $request->session()->put('adminID', Auth::id());
        if (Auth::loginUsingId($user->id)) {
            Artisan::call('cache:clear');

            return redirect()->intended(route($user->userType->title . '.home'));
        }

        return;
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function loginBack(Request $request)
    {
        if ($adminId = $request->session()->pull('adminID', 0))
            if (Auth::loginUsingId($adminId)) {
                Artisan::call('cache:clear');

                return redirect()->intended(route(User::find($adminId)->userType->title . '.home'));
            }

        return;
    }
}
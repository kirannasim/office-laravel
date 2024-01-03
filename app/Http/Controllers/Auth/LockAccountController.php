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

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


/**
 * Class LockAccountController
 * @package App\Http\Controllers
 */
class LockAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function lockScreen()
    {
        session(['locked' => 'true']);

        return view('auth.lockScreen');
    }

    /**
     * @param Request $request
     * @return $this|RedirectResponse|Redirector
     */
    public function unlock(Request $request)
    {
        $password = $request->input('password');

        $this->validate($request, [
            'password' => 'required|string',
        ]);

        if (Hash::check($password, Auth::user()->password)) {
            $request->session()->forget('locked');
            $prefix = trim($request->route()->getPrefix(), '/');
            if ('shared' == $prefix) {
                $prefix = 'user'; //not sure if needed!
            }
            return redirect(route($prefix . '.home'));
            //return redirect(route(getScope() . '.home'));
        }

        return back()->withErrors('Password does not match. Please try again.');
    }
}

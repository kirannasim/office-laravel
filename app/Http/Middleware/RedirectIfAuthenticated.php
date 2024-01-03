<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 *  @author Acemero Technologies Pvt Ltd
 *  @link https://www.acemero.com
 *  @see https://www.hybridmlm.io
 *  @version 1.00
 *  @api Laravel 5.4
 */

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use App\Eloquents\Retortal;

/**
 * Class RedirectIfAuthenticated
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //Retortal SSO
            //https://office.elysiumnetwork.io/user/login?redirect_back=soho
            if ($request->has('redirect_back')) {
                switch(strtolower($request->input('redirect_back'))) {
                    case 'soho':
                        return redirect(Retortal::getRetortalLoginUrl(Auth::guard($guard)->user()));
                    break;

                    case 'soho-dev':
                        return redirect(Retortal::getRetortalDevLoginUrl(Auth::guard($guard)->user()));
                    break;
                }
            }

            return redirect(getScope(). '/home');
        }

        return $next($request);
    }
}

<?php
/**
 *  -------------------------------------------------
 *  THIS WILL BE REMOVED WHEN RETORTAL FINISHES THEIR SSO IMPLEMENTATION
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
class RetortalTmpDevelopmentFilter
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
        if (\Auth::check() && in_array(\Auth::user()->username, Retortal::RetortalTestUserNames)) {
            die(\Auth::user()->username.', you are logged in!');
        }


        return $next($request);
    }
}

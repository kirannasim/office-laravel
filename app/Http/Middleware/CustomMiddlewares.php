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

use App\Blueprint\Services\MenuServices;
use Closure;
use Illuminate\Http\Request;

/**
 * Class CustomMiddlewares
 * @package App\Http\Middleware
 */
class CustomMiddlewares
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(MenuServices::class)->prepareHierarchicalMenus();

        return is_a($request, Request::class) ? $next($request) : $request;
    }
}
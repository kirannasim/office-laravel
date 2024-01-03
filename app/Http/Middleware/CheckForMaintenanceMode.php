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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

/**
 * Class CheckForMaintenanceMode
 * @package App\Http\Middleware
 */
class CheckForMaintenanceMode
{
    protected $request;
    protected $app;

    public function __construct(Application $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
    }

    public function handle($request, Closure $next)
    {
        if(getConfig('maintenance_mode', 'maintenance_mode') === 'on') {
            abort(503, getConfig('maintenance_mode', 'message'));
        }

        return $next($request);
    }
}

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
use App\Blueprint\Services\LanguageHelper;
use Illuminate\Support\Facades\App;

/**
 * Class languageSwitch
 * @package App\Http\Middleware
 */
class LanguageSwitch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $LanguageHelper = app()->make(LanguageHelper::class);
        $LanguageHelper->checkLanguageDir($request->lang)?App::setLocale($request->lang):'';
        return $next($request);
    }
}

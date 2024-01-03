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

namespace App\Components\Modules\Utility\Simulation\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * \
 * Trait Routes
 * @package App\Components\Modules\Utility\Simulation\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        Route::group(['prefix' => 'simulation'], function () {
            Route::get('register/{username}/{sponsor}', 'SimulationController@register')->name('simulation.register');
        });
    }
}
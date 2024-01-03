<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\SoHo\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\SoHo\ModuleCore\Traits
 */
trait Routes
{

    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'soho'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::get('/', 'SoHoController@index')->name($scope . '.soho');
                    }
                    if ($scope == 'user') {
                        Route::get('/', 'SoHoController@index')->name($scope . '.soho');
                    }
                });
            });
    }
}

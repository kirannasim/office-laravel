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

namespace App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {

        foreach (getScopes()->except(['shared', 'admin']) as $scope) {
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'package'], function () use ($scope) {
                    Route::get('upgrade/{status?}', 'PackageUpgradeController@packageUpgrade')->name("$scope.packageUpgrade");
                    Route::post('validate', 'PackageUpgradeController@validatePackageSelected')->name("$scope.package.validate");
                });
            });
        }

    }
}
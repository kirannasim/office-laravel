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

namespace App\Components\Modules\General\HoldingTank\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\AccountStatus\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => ['auth', "Routeserver:$scope"]], function () use ($scope) {
                Route::group(['prefix' => 'holdingTank'], function () use ($scope) {
                    if ($scope == 'admin' || $scope == 'user') {
                        Route::get('/', 'HoldingTankController@index')->name("$scope.holdingTank");
                        Route::post('changeStatus', 'HoldingTankController@changeStatus')->name("$scope.holdingTank.status");
                        Route::post('filter', 'HoldingTankController@filter')->name("$scope.holdingTank.filter");
                        Route::post('fetch', 'HoldingTankController@fetch')->name("$scope.holdingTank.table");
                        Route::post('placeUser', 'HoldingTankController@placeSingleUser')->name("$scope.holdingTank.placeUser");
                        Route::post('placeAllUsers', 'HoldingTankController@placeAllUsers')->name("$scope.holdingTank.placeAllUsers");
                    }
                });
            });
    }
}

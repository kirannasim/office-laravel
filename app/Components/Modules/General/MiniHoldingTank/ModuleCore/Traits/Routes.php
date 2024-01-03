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

namespace App\Components\Modules\General\MiniHoldingTank\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\MiniHoldingTank\ModuleCore\Traits
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
                Route::group(['prefix' => 'miniHoldingTank'], function () use ($scope) {
                    Route::get('/', 'MiniHoldingTankController@index')->name($scope . '.miniHoldingTank');
                    Route::get('miniHoldingTankFilters', 'MiniHoldingTankController@filters')->name($scope . '.miniHoldingTank.filters');
                    Route::post('miniHoldingTankUserTable', 'MiniHoldingTankController@Fetch')->name($scope . '.miniHoldingTank.fetch');
                    Route::post('addUserToSystem', 'MiniHoldingTankController@addUserToSystem')->name($scope . '.miniHoldingTank.add');
                    Route::get('testCron', 'MiniHoldingTankController@testCron');
                });
            });
    }
}

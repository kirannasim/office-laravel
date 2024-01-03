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

namespace App\Components\Modules\General\Xoom\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\Xoom\ModuleCore\Traits
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
                Route::group(['prefix' => 'xoom'], function () use ($scope) {
                    if ($scope == 'admin' || $scope == 'employee') {
                        Route::get('/', 'XoomController@index')->name($scope . '.xoom');
                        Route::get('manage', 'XoomController@manageXoom')->name($scope . '.xoom.manage');

                        Route::post('xoomList', 'XoomController@xoomList')->name($scope . '.xoom.users.list');
                        Route::post('authorizeXoom', 'XoomController@authorizeXoom')->name($scope . '.xoom.users.authorize');
                    }
                    if ($scope == 'user') {
                        Route::get('/', 'XoomController@index')->name($scope . '.xoom');
                    }
                });
            });
    }
}

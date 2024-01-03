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

namespace App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits
 */
trait Routes
{
    /**
     *
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'broadcast'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::get('/', 'EmailBroadcastingController@index')->name($scope . '.email.broadcast.index');
                        Route::get('broadcastUsersFilters', 'EmailBroadcastingController@filters')->name($scope . '.email.broadcast.filters');
                        Route::get('broadcastUsersTable', 'EmailBroadcastingController@Fetch')->name($scope . '.email.broadcast.fetch');
                        Route::post('sendBroadcastEmail', 'EmailBroadcastingController@sendBroadcastEmail')->name($scope . '.email.broadcast.send');
                    }
                });
            });
    }
}
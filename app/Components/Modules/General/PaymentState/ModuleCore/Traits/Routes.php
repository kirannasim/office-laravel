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

namespace App\Components\Modules\General\PaymentState\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\PaymentState\ModuleCore\Traits
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
                Route::group(['prefix' => 'paymentstate'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::get('/', 'PaymentStateController@index')->name($scope . '.email.paymentstate.index');
                        Route::get('paymentUsersFilters', 'PaymentStateController@filters')->name($scope . '.email.paymentstate.filters');
                        Route::get('paymentUsersTable', 'PaymentStateController@Fetch')->name($scope . '.email.paymentstate.fetch');
                        Route::get('paymentdelete', 'PaymentStateController@delete')->name($scope . '.email.paymentstate.delete');
                        Route::get('paymentpaid', 'PaymentStateController@paid')->name($scope . '.email.paymentstate.paid');
                    }
                });
            });
    }
}
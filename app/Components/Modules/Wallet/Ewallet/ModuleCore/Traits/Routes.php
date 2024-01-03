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

namespace App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits
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
                Route::group(['prefix' => 'ewallet'], function () use ($scope) {
                    Route::get('/', 'EwalletController@index')->name($scope . ".ewallet");
                    Route::post('transfer', 'EwalletController@transfer')->name($scope . ".ewallet.transfer");
                    Route::post('requestUnit', 'EwalletController@requestUnit')->name($scope . ".ewallet.unit");
                    Route::post('deduct', 'EwalletController@deduct')->name($scope . ".ewallet.deduct");
                    Route::post('balance', 'EwalletController@balance')->name($scope . ".ewallet.balance");
                    Route::post('password', 'EwalletController@submitTransactionPass')->name($scope . ".ewallet.submitTransactionPass");
                    Route::post('validateTransfer', 'EwalletController@validateTransfer')->name($scope . ".ewallet.validate.transfer");
                    Route::post('initPayment', 'EwalletController@initPayment')->name($scope . ".ewallet.initPayment");
                    Route::post('ipWhitelist', 'EwalletController@ipWhitelist')->name($scope . ".ewallet.validate.ip.whitelist");
                    Route::post('renderTranPasswordView', 'EwalletController@renderTranPasswordView')->name($scope . ".ewallet.tran.password.view");
                    Route::post('validateChangeTransactionPassword', 'EwalletController@validateChangeTransactionPassword')->name($scope . ".ewallet.validate.change_password");
                    Route::post('renderLoginPasswordView', 'EwalletController@renderLoginPasswordView')->name($scope . ".ewallet.login.password_view");
                    Route::post('set_password', 'EwalletController@setTransactionPassword')->name($scope . ".ewallet.set_password");
                });
            });
    }
}
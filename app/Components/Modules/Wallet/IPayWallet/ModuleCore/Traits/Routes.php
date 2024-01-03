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

namespace App\Components\Modules\Wallet\IPayWallet\ModuleCore\Traits;

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
                Route::group(['prefix' => 'ipaywallet'], function () use ($scope) {
                    Route::get('/', 'IPayWalletController@index')->name($scope . ".ipaywallet");
                    Route::post('transfer', 'IPayWalletController@transfer')->name($scope . ".ipaywallet.transfer");
                    Route::post('requestUnit', 'IPayWalletController@requestUnit')->name($scope . ".ipaywallet.unit");
                    Route::post('deduct', 'IPayWalletController@deduct')->name($scope . ".ipaywallet.deduct");
                    Route::post('balance', 'IPayWalletController@balance')->name($scope . ".ipaywallet.balance");
                    Route::post('password', 'IPayWalletController@submitTransactionPass')->name($scope . ".ipaywallet.submitTransactionPass");
                    Route::post('validateTransfer', 'IPayWalletController@validateTransfer')->name($scope . ".ipaywallet.validate.transfer");
                    Route::post('initPayment', 'IPayWalletController@initPayment')->name($scope . ".ipaywallet.initPayment");
                    Route::post('ipWhitelist', 'IPayWalletController@ipWhitelist')->name($scope . ".ipaywallet.validate.ip.whitelist");
                    Route::post('renderTranPasswordView', 'IPayWalletController@renderTranPasswordView')->name($scope . ".ipaywallet.tran.password.view");
                    Route::post('validateChangeTransactionPassword', 'IPayWalletController@validateChangeTransactionPassword')->name($scope . ".ipaywallet.validate.change_password");
                    Route::post('renderLoginPasswordView', 'IPayWalletController@renderLoginPasswordView')->name($scope . ".ipaywallet.login.password_view");
                    Route::post('set_password', 'IPayWalletController@setTransactionPassword')->name($scope . ".ipaywallet.set_password");
                });
            });
    }
}
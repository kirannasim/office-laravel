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

namespace App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits;

use App\Eloquents\UserType;
use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Wallet\IPayWallet\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes() as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                //E-wallet
                Route::group(['prefix' => 'IPayWallet'], function () use ($scope) {
                    Route::post('transactionPass', 'IPayWalletController@transactionPass')->name("$scope.ipaywallet.pass");
                    Route::get('transactionPassView', 'IPayWalletController@getTransactionPassView')->name("$scope.ipaywallet.pass.view");
                });
            });
    }
}

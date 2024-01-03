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

namespace App\Components\Modules\Payment\Ewallet\ModuleCore\Traits;

use App\Eloquents\UserType;
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
        foreach (getScopes() as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                //E-wallet
                Route::group(['prefix' => 'ewallet'], function () use ($scope) {
                    Route::post('transactionPass', 'EwalletController@transactionPass')->name("$scope.ewallet.pass");
                    Route::get('transactionPassView', 'EwalletController@getTransactionPassView')->name("$scope.ewallet.pass.view");
                });
            });
    }
}

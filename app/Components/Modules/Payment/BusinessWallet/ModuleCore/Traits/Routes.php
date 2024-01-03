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

namespace App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'Routeserver:admin'], function () {
            //Business-wallet
            Route::group(['prefix' => 'businesswallet'], function () {
                Route::post('transactionPass', 'BusinessWalletController@transactionPass')->name('businesswallet.pass');
                Route::get('transactionPass', 'BusinessWalletController@getTransactionPassView')->name('businesswallet.pass.view');
            });
        });
    }
}

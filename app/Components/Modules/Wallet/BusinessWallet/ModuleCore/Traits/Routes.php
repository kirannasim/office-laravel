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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits;

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
                Route::get('/', 'BusinessWalletController@index')->name('businesswallet');
                Route::post('transfer', 'BusinessWalletController@transfer')->name('businesswallet.transfer');
                Route::post('deposit', 'BusinessWalletController@deposit')->name('businesswallet.deposit');
                Route::post('requestUnit', 'BusinessWalletController@requestUnit')->name('businesswallet.unit');
                Route::post('deduct', 'BusinessWalletController@deduct')->name('businesswallet.deduct');
                Route::post('balance', 'BusinessWalletController@walletBalance')->name('businesswallet.balance');
                Route::post('password', 'BusinessWalletController@submitTransactionPass')->name('admin.businesswallet.submitTransactionPass');
                Route::post('ip', 'BusinessWalletController@addIp')->name('admin.businesswallet.addIp');
                Route::post('validateTransfer', 'BusinessWalletController@validateTransfer')->name('businesswallet.validate.transfer');
                Route::post('initPayment', 'BusinessWalletController@initPayment')->name('businesswallet.initPayment');
                Route::post('validateDeduct', 'BusinessWalletController@validateDeduct')->name('businesswallet.validate.deduct');
                Route::post('validateDeposit', 'BusinessWalletController@validateDeposit')->name('businesswallet.validate.deposit');
                Route::post('ipwhitelist', 'BusinessWalletController@ipWhitelist')->name('admin.businesswallet.validate.ip.whitelist');
                Route::post('renderTranPasswordView', 'BusinessWalletController@renderTranPasswordView')->name('admin.businesswallet.tran.password.view');
                Route::post('validateChangeTransactionpassword', 'BusinessWalletController@validateChangeTransactionPassword')->name('admin.businesswallet.validate.change_password');
                Route::post('checkRwalletPassword', 'BusinessWalletController@checkBusinessWalletPassword')->name('admin.businesswallet.check.tran.password');
                Route::post('renderLoginPasswordView', 'BusinessWalletController@renderLoginPasswordView')->name("admin.businesswallet.login.password_view");
                Route::post('set_password', 'BusinessWalletController@setTransactionPassword')->name("admin.businesswallet.set_password");
            });
        });
    }
}
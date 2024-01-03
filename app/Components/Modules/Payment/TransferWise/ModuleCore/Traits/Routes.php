<?php

namespace App\Components\Modules\Payment\TransferWise\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Payment\B2BPay\Traits
 */
trait Routes
{

    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'zota'], function () use ($scope) {
                    Route::get('test', 'TransferWiseController@test');
                });
            });


        Route::any('transferwise/success', 'TransferWiseController@Success')->name('transferwise.success');
        Route::get('transferwise/cancel', 'TransferWiseController@cancel')->name('transferwise.cancel');
        Route::get('transferwise/countryfilter','TransferWiseController@CountryFilter')->name('transferwise.countryfilter');
        Route::any('transferwise/api/callBack', 'TransferWiseController@callBack')->name('transferwise.callBack')->middleware('Routeserver:shared');
    }

}
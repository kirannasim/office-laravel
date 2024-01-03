<?php

namespace App\Components\Modules\Payment\SafeCharge\ModuleCore\Traits;

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
                Route::group(['prefix' => 'SafeCharge'], function () use ($scope) {
                    Route::get('test', 'SafeChargeController@test');
                });
            });


        Route::any('SafeCharge/success', 'SafeChargeController@Success')->name('SafeCharge.success');
        Route::any('SafeCharge/cancel', 'SafeChargeController@cancel')->name('SafeCharge.cancel');
        Route::any("SafeCharge/payment",'SafeChargeController@payment')->name('SafeCharge.payment')->middleware('Routeserver:shared');
         Route::any("SafeCharge/pay",'SafeChargeController@pay')->name('SafeCharge.pay')->middleware('Routeserver:shared');
        Route::any('SafeCharge/api/callBack', 'SafeChargeController@callBack')->name('SafeCharge.callBack')->middleware('Routeserver:shared');
    }

}
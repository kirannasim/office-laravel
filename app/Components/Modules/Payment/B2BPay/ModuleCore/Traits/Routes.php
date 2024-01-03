<?php

namespace App\Components\Modules\Payment\B2BPay\ModuleCore\Traits;

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
                Route::group(['prefix' => 'b2b'], function () use ($scope) {
                    Route::get('test', 'B2BPayController@test');
                });
            });


        Route::get('b2b/success', 'B2BPayController@Success')->name('b2b.success');
        Route::get('b2b/cancel', 'B2BPayController@cancel')->name('b2b.cancel');

        Route::any('b2b/api/callBack', 'B2BPayController@callBack')->name('b2b.callBack')->middleware('Routeserver:shared');
    }

}
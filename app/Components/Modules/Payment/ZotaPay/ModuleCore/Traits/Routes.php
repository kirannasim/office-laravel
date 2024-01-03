<?php

namespace App\Components\Modules\Payment\ZotaPay\ModuleCore\Traits;

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
                    Route::get('test', 'ZotaPayController@test');
                });
            });


        Route::get('zota/success', 'ZotaPayController@Success')->name('zota.success');
        Route::get('zota/cancel', 'ZotaPayController@cancel')->name('zota.cancel');

        Route::any('zota/api/callBack', 'ZotaPayController@callBack')->name('zota.callBack')->middleware('Routeserver:shared');
    }

}
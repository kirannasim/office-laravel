<?php

namespace App\Components\Modules\Payment\Genome\ModuleCore\Traits;

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
                Route::group(['prefix' => 'Genome'], function () use ($scope) {
                    Route::get('test', 'GenomeController@test');
                });
            });


        Route::any('Genome/success', 'GenomeController@Success')->name('Genome.success');
        Route::any('Genome/cancel', 'GenomeController@cancel')->name('Genome.cancel');
        Route::any("Genome/payment",'GenomeController@payment')->name('Genome.payment')->middleware('Routeserver:shared');
        Route::any('Genome/api/callBack', 'GenomeController@callBack')->name('Genome.callBack')->middleware('Routeserver:shared');
    }

}
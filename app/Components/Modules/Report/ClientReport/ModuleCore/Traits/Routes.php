<?php

namespace App\Components\Modules\Report\ClientReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\ClientReport\ModuleCore\Traits
 */
trait Routes
{
    /**
     * setRoutes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope) {
            Route::group(['prefix' => $scope, 'middleware' => ["auth", "Routeserver:$scope"]], function () use ($scope) {
                Route::group(['prefix' => 'report'], function () use ($scope) {
                    Route::get('clientReport', 'ClientReportController@index')->name("$scope.clientReport.index");
                    Route::get('filter', 'ClientReportController@getFilter')->name("$scope.clientReport.filters");
                    Route::post('client', 'ClientReportController@getClients')->name("$scope.clientReport.clients");
                });
                if ($scope == 'user') {
                    Route::group(['prefix' => 'tool'], function () use ($scope) {
                        Route::group(['prefix' => 'report'], function () use ($scope) {
                            Route::get('clientReport', 'ClientReportController@index')->name("$scope.clientReport.index");
                            Route::get('filter', 'ClientReportController@getFilter')->name("$scope.clientReport.filters");
                            Route::post('client', 'ClientReportController@getClients')->name("$scope.clientReport.clients");
                        });
                    });

                }
            });
        }
    }
}

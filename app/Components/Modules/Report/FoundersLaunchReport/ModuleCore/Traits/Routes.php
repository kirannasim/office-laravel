<?php

namespace App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Traits
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
                    Route::get('foundersLaunchReport', 'FoundersLaunchReportController@index')->name("$scope.foundersLaunchReport.index");
                    Route::get('filter', 'FoundersLaunchReportController@getFilter')->name("$scope.foundersLaunchReport.filters");
                    Route::post('founder', 'FoundersLaunchReportController@getClients')->name("$scope.foundersLaunchReport.founders");
                });
            });
        }
    }
}

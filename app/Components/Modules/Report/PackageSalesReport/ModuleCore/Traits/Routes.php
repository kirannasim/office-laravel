<?php

namespace App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits
 */
trait Routes
{
    /**
     *set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'report'], function () use ($scope) {
                    Route::get('packageSales', 'PackageSalesReportController@index')->name("$scope.packageSales.index");
                    Route::get('filters', 'PackageSalesReportController@filters')->name("$scope.packageSales.filters");
                    Route::post('fetch', 'PackageSalesReportController@fetch')->name("$scope.packageSales.fetch");
                    Route::post('downloadExcel', 'PackageSalesReportController@downloadExcel')->name("$scope.packageSales.download.excel");
                    // Route::get('packageSales', 'PackageSalesReportController@index')->name("$scope.report.packageSales");
                });
            });
    }
}
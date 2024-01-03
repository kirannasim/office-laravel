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

namespace App\Components\Modules\Report\BinaryPointReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\BinaryReport\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'report'], function () use ($scope) {
                    Route::get('binaryPoint', 'BinaryPointReportController@index')->name("$scope.report.binaryPoint");
                    Route::get('binaryPointReportFilters', 'BinaryPointReportController@filters')->name("$scope.binaryPointReport.filters");
                    Route::post('binaryPointReportTable', 'BinaryPointReportController@Fetch')->name("$scope.binaryPointReport.fetch");

                    if ($scope == 'admin' || $scope == 'user') {
                        Route::get('cycleReport', 'BinaryPointReportController@cycleReportIndex')->name("$scope.report.cycleReport");
                        Route::get('cycleReportFilters', 'BinaryPointReportController@cycleReportFilters')->name("$scope.cycleReport.filters");
                        Route::post('cycleReportTable', 'BinaryPointReportController@cycleReportTable')->name("$scope.cycleReport.fetch");
                    }
                });
                if ($scope == 'user') {
                    Route::group(['prefix' => 'tool'], function () use ($scope) {
                        Route::group(['prefix' => 'report'], function () use ($scope) {
                            Route::get('binaryPoint', 'BinaryPointReportController@index')->name("$scope.report.binaryPoint");
                            Route::get('binaryPointReportFilters', 'BinaryPointReportController@filters')->name("$scope.binaryPointReport.filters");
                            Route::post('cycleReportTable', 'BinaryPointReportController@cycleReportTable')->name("$scope.cycleReport.fetch");
                        });
                    });
                }
            });
    }
}

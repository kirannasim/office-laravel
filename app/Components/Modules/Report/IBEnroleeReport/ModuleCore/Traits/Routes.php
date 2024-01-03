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

namespace App\Components\Modules\Report\IBEnroleeReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\IBEnroleeReport\ModuleCore\Traits
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
                    Route::get('ibEnrollee', 'IBEnroleeReportController@index')->name($scope . '.report.ibEnrollee');
                    Route::get('ibEnrolleeFilters', 'IBEnroleeReportController@filters')->name($scope . '.ibEnrolleeReport.filters');
                    Route::post('ibEnrolleeReportTable', 'IBEnroleeReportController@Fetch')->name($scope . '.ibEnrolleeReport.fetch');
                });
            });


    }
}

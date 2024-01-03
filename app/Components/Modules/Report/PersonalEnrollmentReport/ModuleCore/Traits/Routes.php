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

namespace App\Components\Modules\Report\PersonalEnrollmentReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\PersonalEnrollmentReport\ModuleCore\Traits
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
                    Route::get('personalEnrollee', 'PersonalEnrollmentReportController@index')->name($scope . '.report.personalEnrollee');
                    Route::get('personalEnrolleeFilters', 'PersonalEnrollmentReportController@filters')->name($scope . '.personalEnrolleeReport.filters');
                    Route::post('personalEnrolleeReportTable', 'PersonalEnrollmentReportController@Fetch')->name($scope . '.personalEnrolleeReport.fetch');
                });
            });

    }
}

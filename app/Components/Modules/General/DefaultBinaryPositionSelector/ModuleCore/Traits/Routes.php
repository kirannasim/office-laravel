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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits
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
                Route::group(['prefix' => 'manage/account'], function () use ($scope) {
                    Route::post('saveDefaultBinaryPosition', 'BinaryPositionSelectorController@saveDefaultBinaryPosition')->name("$scope.defaultBinaryPosition.save");
                    if ($scope == 'admin') {
                        Route::get('defaultBinaryPositionReport', 'BinaryPositionSelectorController@defaultBinaryPositionReportIndex')->name('defaultBinaryPositionReport');
                        Route::get('defaultBinaryPositionReportFilters', 'BinaryPositionSelectorController@defaultBinaryPositionReportFilters')->name('defaultBinaryPositionReport.filters');
                        Route::post('fetchDefaultBinaryPositionReport', 'BinaryPositionSelectorController@fetchDefaultBinaryPositionReport')->name('defaultBinaryPositionReport.fetch');
                        Route::post('defaultBinaryPositionReportPdf', 'BinaryPositionSelectorController@downloaDdefaultBinaryPositionReportPdf')->name('defaultBinaryPositionReport.download.pdf');
                        Route::post('defaultBinaryPositionReportExcel', 'BinaryPositionSelectorController@downloaDdefaultBinaryPositionReportExcel')->name('defaultBinaryPositionReport.download.excel');
                        Route::post('defaultBinaryPositionReportCsv', 'BinaryPositionSelectorController@downloaDdefaultBinaryPositionReportCsv')->name('defaultBinaryPositionReport.download.csv');
                        Route::post('printDefaultBinaryPositionReport', 'BinaryPositionSelectorController@printDefaultBinaryPositionReport')->name('defaultBinaryPositionReport.print');
                    }
                });
            });
    }
}

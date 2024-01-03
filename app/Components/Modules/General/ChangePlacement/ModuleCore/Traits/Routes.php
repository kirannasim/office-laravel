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

namespace App\Components\Modules\General\ChangePlacement\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\ChangePlacement\ModuleCore\Traits
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
                    if ($scope == 'admin') {
                        Route::post('saveChangePlacement', 'ChangePlacementController@saveChangePlacement')->name('ChangePlacement.save');
                        Route::get('changePlacementHistory', 'ChangePlacementController@changePlacementHistoryReportIndex')->name('changePlacementReport');
                        Route::get('changePlacementHistoryFilters', 'ChangePlacementController@changePlacementHistoryFilters')->name('changePlacementReport.filters');
                        Route::post('fetchChangePlacementHistoryReport', 'ChangePlacementController@fetchChangePlacementHistoryReport')->name('changePlacementReport.fetch');
                        Route::post('changePlacementHistoryPdf', 'ChangePlacementController@downloadChangePlacementHistoryPdf')->name('changePlacementReport.download.pdf');
                        Route::post('changePlacementHistoryExcel', 'ChangePlacementController@downloadChangePlacementHistoryExcel')->name('changePlacementReport.download.excel');
                        Route::post('changePlacementHistoryCsv', 'ChangePlacementController@downloadChangePlacementHistoryCsv')->name('changePlacementReport.download.csv');
                        Route::post('printChangePlacementHistory', 'ChangePlacementController@printChangePlacementHistory')->name('changePlacementReport.print');
                    }
                });
            });
    }
}

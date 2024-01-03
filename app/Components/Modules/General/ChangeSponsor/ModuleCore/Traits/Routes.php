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

namespace App\Components\Modules\General\ChangeSponsor\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\ChangeSponsor\ModuleCore\Traits
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
                        Route::post('saveChangeSponsor', 'ChangeSponsorController@saveChangeSponsor')->name('ChangeSponsor.save');
                        Route::get('changeSponsorHistory', 'ChangeSponsorController@changeSponsorHistoryReportIndex')->name('changeSponsorReport');
                        Route::get('changeSponsorHistoryFilters', 'ChangeSponsorController@changeSponsorHistoryFilters')->name('changeSponsorReport.filters');
                        Route::post('fetchChangeSponsorHistoryReport', 'ChangeSponsorController@fetchChangeSponsorHistoryReport')->name('changeSponsorReport.fetch');
                        Route::post('changeSponsorHistoryPdf', 'ChangeSponsorController@downloadChangeSponsorHistoryPdf')->name('changeSponsorReport.download.pdf');
                        Route::post('changeSponsorHistoryExcel', 'ChangeSponsorController@downloadChangeSponsorHistoryExcel')->name('changeSponsorReport.download.excel');
                        Route::post('changeSponsorHistoryCsv', 'ChangeSponsorController@downloadChangeSponsorHistoryCsv')->name('changeSponsorReport.download.csv');
                        Route::post('printChangeSponsorHistory', 'ChangeSponsorController@printChangeSponsorHistory')->name('changeSponsorReport.print');
                    }
                });
            });
    }
}
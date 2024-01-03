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

namespace App\Components\Modules\General\AccountStatus\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\AccountStatus\ModuleCore\Traits
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
                        Route::post('saveAccountStatus', 'AccountStatusController@saveAccountStatus')->name('accountStatus.save');

                        Route::get('accountStatusHistory', 'AccountStatusController@accountStatusHistoryReportIndex')->name('accountStatusReport');
                        Route::get('accountStatusHistoryFilters', 'AccountStatusController@accountStatusHistoryFilters')->name('accountStatusReport.filters');
                        Route::post('fetchAccountStatusHistoryReport', 'AccountStatusController@fetchAccountStatusHistoryReport')->name('accountStatusReport.fetch');
                        Route::post('downloadAccountStatusHistoryReportPdf', 'AccountStatusController@downloadAccountStatusHistoryReportPdf')->name('accountStatusReport.download.pdf');
                        Route::post('downloadAccountStatusHistoryReportExcel', 'AccountStatusController@downloadAccountStatusHistoryReportExcel')->name('accountStatusReport.download.excel');
                        Route::post('downloadAccountStatusHistoryReportCsv', 'AccountStatusController@downloadAccountStatusHistoryReportCsv')->name('accountStatusReport.download.csv');
                        Route::post('printSAccountStatusHistoryReport', 'AccountStatusController@printAccountStatusHistoryReport')->name('accountStatusReport.print');

                        Route::get('currentAccountStatus', 'AccountStatusController@currentAccountStatusRportIndex')->name('currentAccountStatusReport');
                        Route::get('currentAccountStatusReportFilters', 'AccountStatusController@currentAccountStatusReportFilters')->name('currentAccountStatusReport.filters');
                        Route::post('fetchAccountStatusReport', 'AccountStatusController@fetchAccountStatusReport')->name('currentAccountStatusReport.fetch');
                        Route::post('downloadCurrentAccountStatusHistoryReportPdf', 'AccountStatusController@downloadCurrentAccountStatusHistoryReportPdf')->name('currentAccountStatusReport.download.pdf');
                        Route::post('downloadCurrentAccountStatusHistoryReportExcel', 'AccountStatusController@downloadCurrentAccountStatusHistoryReportExcel')->name('currentAccountStatusReport.download.excel');
                        Route::post('downloadCurrentAccountStatusHistoryReportCsv', 'AccountStatusController@downloadCurrentAccountStatusHistoryReportCsv')->name('currentAccountStatusReport.download.csv');
                        Route::post('printCurrentAccountStatusHistoryReport', 'AccountStatusController@printCurrentAccountStatusHistoryReport')->name('currentAccountStatusReport.print');
                    }
                });
            });
    }
}

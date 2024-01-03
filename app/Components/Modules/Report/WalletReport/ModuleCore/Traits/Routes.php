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

namespace App\Components\Modules\Report\WalletReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\WalletReport\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except(['shared', 'user']) as $scope) :
            Route::group(['prefix' => $scope, 'middleware' => ['auth', "Routeserver:$scope"]], function () use ($scope) {
                if ($scope == 'admin' || $scope == 'employee') {
                    Route::group(['prefix' => 'report/wallet'], function () use ($scope) {
                        Route::group(['prefix' => 'fundReport'], function () use ($scope) {
                            Route::get('/', 'WalletReportController@fundReportIndex')->name("$scope.walletReport.fundReport");
                            Route::get('filters', 'WalletReportController@fundReportFilters')->name("$scope.walletReport.fundReport.filters");
                            Route::post('fetch', 'WalletReportController@fetchFundReport')->name("$scope.walletReport.fundReport.fetch");
                            Route::post('downloadPdf', 'WalletReportController@downloadFundReportPdf')->name("$scope.walletReport.fundReport.download.pdf");
                            Route::post('downloadExcel', 'WalletReportController@downloadFundReportExcel')->name("$scope.walletReport.fundReport.download.excel");
                            Route::post('downloadCsv', 'WalletReportController@downloadFundReportCsv')->name("$scope.walletReport.fundReport.download.csv");
                            Route::post('printReport', 'WalletReportController@printFundReport')->name("$scope.walletReport.fundReport.print");

                        });

                        Route::group(['prefix' => 'fundTransferReport'], function () use ($scope) {
                            Route::get('/', 'WalletReportController@fundTransferReportIndex')->name("$scope.walletReport.fundTransferReport");
                            Route::get('filters', 'WalletReportController@fundTransferReportFilters')->name("$scope.walletReport.fundTransferReport.filters");
                            Route::post('fetch', 'WalletReportController@fetchFundTransferReport')->name("$scope.walletReport.FundTransferReport.fetch");
                            Route::post('downloadPdf', 'WalletReportController@downloadFundTransferReportPdf')->name("$scope.walletReport.FundTransferReport.download.pdf");
                            Route::post('downloadExcel', 'WalletReportController@downloadFundTransferReportExcel')->name("$scope.walletReport.FundTransferReport.download.excel");
                            Route::post('downloadCsv', 'WalletReportController@downloadFundTransferReportCsv')->name("$scope.walletReport.FundTransferReport.download.csv");
                            Route::post('printReport', 'WalletReportController@printFundTransferReport')->name("$scope.walletReport.FundTransferReport.print");
                        });
                    });
                }
            });
        endforeach;
    }
}
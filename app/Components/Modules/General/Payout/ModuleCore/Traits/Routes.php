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

namespace App\Components\Modules\General\Payout\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope):
            if ($scope == 'shared') continue;

            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                //Payout
                Route::group(['prefix' => 'payout'], function () use ($scope) {

                    $prefix = ($scope == 'employee') ? 'admin' : $scope;


                    Route::get('/', 'PayoutController@' . $prefix . 'Index')->name("$scope.payout");

                    Route::post('unit', 'PayoutController@requestUnit')->name("$scope.payout.unit");

                    Route::any('basicProfile/{user}', 'PayoutController@basicProfile')->name("$scope.payout.basicProfile");
                    Route::any('transactionPass', 'PayoutController@transactionPass')->name("$scope.payout.pass");

                    Route::any('manuallyProcessed', 'PayoutController@manuallyProcessed')->name("$scope.payout.manual.processed");
                    Route::any('saveSelectedWallet', 'PayoutController@saveSelectedWalletForRequest')->name("$scope.payout.request.selectWallet");


                    if (($scope == 'admin') || ($scope == 'employee')) {
                        Route::post('validatePayout', 'PayoutController@validatePayout')->name("$scope.payout.validate");
                        Route::post('generateSecurityPin', 'PayoutController@securityPinView')->name("$scope.payout.generateSecurityPin");
                        Route::any('detailedStatement', 'PayoutController@statement')->name("$scope.payout.statement");
                        Route::post('getPayoutRequests', 'PayoutController@getPayoutRequests')->name("$scope.payout.requests");
                        Route::post('releaseRequestedPayouts', 'PayoutController@releaseRequestedPayouts')->name("$scope.payout.requests.release");

                        // report routes
                        Route::get('requestReport', 'PayoutController@payoutRequestReportIndex')->name("$scope.payout.report.request");
                        Route::get('requestReportFilters', 'PayoutController@requestReportFilters')->name("$scope.payout.report.request.filters");
                        Route::post('fetchPayoutRequestReport', 'PayoutController@fetchPayoutRequestReport')->name("$scope.payout.report.request.fetch");
                        Route::post('downloadPayoutRequestReportPdf', 'PayoutController@downloadPayoutRequestReportPdf')->name("$scope.payout.report.request.download.pdf");
                        Route::post('downloadPayoutRequestReportExcel', 'PayoutController@downloadPayoutRequestReportExcel')->name("$scope.payout.report.request.download.excel");
                        Route::post('downloadPayoutRequestReportCsv', 'PayoutController@downloadPayoutRequestReportCsv')->name("$scope.payout.report.request.download.csv");
                        Route::post('printPayoutRequestReportReport', 'PayoutController@printPayoutRequestReport')->name("$scope.payout.report.request.print");

                        Route::get('releasedReport', 'PayoutController@payoutReleasedReportIndex')->name("$scope.payout.report.Released");
                        Route::get('ReleasedReportFilters', 'PayoutController@ReleasedReportFilters')->name("$scope.payout.report.Released.filters");
                        Route::post('fetchPayoutReleasedReport', 'PayoutController@fetchPayoutReleasedReport')->name("$scope.payout.report.Released.fetch");
                        Route::post('downloadPayoutReleasedReportPdf', 'PayoutController@downloadPayoutReleasedReportPdf')->name("$scope.payout.report.Released.download.pdf");
                        Route::post('downloadPayoutReleasedReportExcel', 'PayoutController@downloadPayoutReleasedReportExcel')->name("$scope.payout.report.Released.download.excel");
                        Route::post('downloadPayoutReleasedReportCsv', 'PayoutController@downloadPayoutReleasedReportCsv')->name("$scope.payout.report.Released.download.csv");
                        Route::post('printPayoutReleasedReportReport', 'PayoutController@printPayoutReleasedReport')->name("$scope.payout.report.Released.print");
                    }
                    if ($scope == 'user') {
                        Route::post('getRequestList', 'PayoutController@getRequestList')->name("$scope.payout.requestList");
                        Route::post('getPayoutRequestForm', 'PayoutController@getPayoutRequestForm')->name("$scope.payout.request.form");
                        Route::post('savePayoutRequest', 'PayoutController@savePayoutRequest')->name("$scope.save.payout.request");
                        Route::post('gerRequestSuccessView', 'PayoutController@getRequestSucessView')->name("$scope.payout.request.success");
                        Route::post('walletPicker', 'PayoutController@walletPicker')->name("$scope.payout.request.walletPicker");
                        Route::post('gatewayView', 'PayoutController@gatewayView')->name("$scope.payout.request.gatewayView");
                        Route::post('validateRequest', 'PayoutController@validateRequest')->name("$scope.payout.request.validate");
                        Route::post('cancelRequest', 'PayoutController@cancelRequest')->name("$scope.payout.request.cancel");
                        Route::post('transactionCharges', 'PayoutController@getCharges')->name("$scope.payout.request.transactionCharges");

                    }
                });
            });
        endforeach;
    }
}

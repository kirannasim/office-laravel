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

namespace App\Components\Modules\General\ReferralList\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\ReferralList\ModuleCore\Traits
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
                Route::group(['prefix' => 'referral'], function () use ($scope) {
                    if ($scope == 'admin' || $scope == 'user') {
                        Route::post('referralGraph', 'ReferralListController@referralGraph')->name($scope . '.ReferralList.graph');
                        Route::post('list', 'ReferralListController@referralList')->name($scope . '.ReferralList.list');
                        Route::get('myReferral', 'ReferralListController@myReferral')->name($scope . '.ReferralList.myReferral');
                    }
                });
                if ($scope == 'user') {
                    Route::group(['prefix' => 'tool'], function () use ($scope) {
                        Route::group(['prefix' => 'report'], function () use ($scope) {
                            Route::post('referralGraph', 'ReferralListController@referralGraph')->name($scope . '.report.ReferralList.graph');
                            Route::post('list', 'ReferralListController@referralList')->name($scope . '.report.ReferralList.list');
                            Route::get('myReferral', 'ReferralListController@myReferral')->name($scope . '.report.ReferralList.myReferral');
                        });
                    });
                }
            });
    }
}

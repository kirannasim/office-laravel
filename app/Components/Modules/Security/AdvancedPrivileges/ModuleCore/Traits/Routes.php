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

namespace App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\AdvancedPrivileges\ModuleCore\Traits
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
                //Account Status
                Route::group(['prefix' => 'settings/privileges'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::get('assign', 'PrivilegeController@showPrivileges')->name('privilages.show');
                        Route::get('assignForm', 'PrivilegeController@privilegeAssignForm')->name('privilages.assign.form');
                        Route::get('shortlist', 'PrivilegeController@shortlist')->name('privilages.shortlist');
                        Route::post('save', 'PrivilegeController@savePrivileges')->name('save.privilages');
                        Route::post('query', 'PrivilegeController@queryPrivileges')->name('privilages.query');
                        Route::post('queryshortlist', 'PrivilegeController@queryShortList')->name('privilages.shortlist.query');
                    }
                });
            });
    }
}
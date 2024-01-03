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

namespace App\Components\Modules\Tree\TabularTree\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Tree\TabularTree\Traits
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
                Route::group(['prefix' => 'tree'], function () use ($scope) {
                    Route::group(['prefix' => 'tabularTree'], function () use ($scope) {
                        Route::match(['get', 'post'], 'view/{type?}/{id?}', 'TabularTreeController@index')->name("$scope.tree.tabularTree");
                        Route::match(['get', 'post'], 'loadTreeNode/{id?}', 'TabularTreeController@loadTreeNode')->name("$scope.tree.tabularTree.loadTreeNode");
                        Route::match(['get', 'post'], 'tooltip/{id}', 'TabularTreeController@tooltip')->name("$scope.tree.tabularTree.tooltip");
                        Route::match(['post'], 'getParentTreeNodes', 'TabularTreeController@getParentTreeNodes')->name("$scope.tree.tabularTree.getParentTreeNodes");
                    });
                });
            });
    }
}
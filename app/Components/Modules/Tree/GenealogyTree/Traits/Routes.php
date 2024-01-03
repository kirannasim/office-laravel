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

namespace App\Components\Modules\Tree\GenealogyTree\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Tree\GenealogyTree\Traits
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
                    Route::group(['prefix' => 'genealogyTree'], function () use ($scope) {
                        Route::match(['get', 'post'], 'view/{type?}/{id?}', 'GenealogyTreeController@index')->name("$scope.tree.genealogyTree");
                        Route::match(['get', 'post'], 'reload/{id?}', 'GenealogyTreeController@reload')->name("$scope.tree.genealogyTree.reload");
                        Route::match(['get', 'post'], 'tooltip/{id}', 'GenealogyTreeController@tooltip')->name("$scope.tree.genealogyTree.tooltip");
                    });
                });

                Route::group(['prefix' => 'tree'], function () use ($scope) {
                    Route::group(['prefix' => 'userRegister'], function () use ($scope) {
                        Route::match(['get', 'post'], 'view', 'GenealogyTreeController@newenrollee')->name("$scope.tree.userRegister");
                    });
                });

                Route::get('testregister','GenealogyTreeController@testregister')->name("$scope.testregister");
                Route::get('testregistersimple','GenealogyTreeController@testregistersimple')->name("$scope.testregistersimple");
            });


    }
}
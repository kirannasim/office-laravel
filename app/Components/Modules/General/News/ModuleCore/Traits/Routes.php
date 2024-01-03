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

namespace App\Components\Modules\General\News\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\News\Traits
 */
trait Routes
{

    /**
     * Set Routes For News
     */

    function setRoutes()
    {
        foreach (getScopes()->except('shared') as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'news'], function () use ($scope) {
                    if (($scope == 'admin') || ($scope == 'employee')) {
                        Route::get('config', 'NewsController@manageNews')->name($scope . '.news.manage');
                        Route::post('saveNews', 'NewsController@saveNews')->name($scope . '.news.save');
                        Route::post('getNews', 'NewsController@getNews')->name($scope . '.news.get');
                        Route::post('DeleteNews', 'NewsController@deleteNews')->name($scope . '.news.delete');
                        Route::get('newsForm/{id?}', 'NewsController@getForm')->name($scope . '.news.form');
                        Route::get('newsList', 'NewsController@getNewsList')->name($scope . '.news.list');
                    }
                });
            });
    }

}

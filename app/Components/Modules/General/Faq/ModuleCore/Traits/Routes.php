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

namespace App\Components\Modules\General\Faq\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\Faq\ModuleCore\Traits
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
                Route::group(['prefix' => 'faq'], function () use ($scope) {
                    if ($scope == 'admin' || $scope == 'employee') {
                        Route::get('/', 'FaqController@index')->name($scope . '.faq');
                        Route::get('manage', 'FaqController@manageFaq')->name($scope . '.faq.manage');
                        Route::post('requestUnit', 'FaqController@requestUnit')->name($scope . '.faq.unit');
                        Route::post('categoryList', 'FaqController@categoryList')->name($scope . '.faq.category.list');
                        Route::post('categoryForm', 'FaqController@categoryForm')->name($scope . '.faq.category.form');
                        Route::post('saveCategory', 'FaqController@saveCategory')->name($scope . '.faq.category.save');
                        Route::post('deleteCategory', 'FaqController@deleteCategory')->name($scope . '.faq.category.delete');
                        Route::post('faqForm', 'FaqController@faqForm')->name($scope . '.faq.question.form');
                        Route::post('saveFaq', 'FaqController@saveFaq')->name($scope . '.faq.question.save');
                        Route::post('faqList', 'FaqController@faqList')->name($scope . '.faq.question.list');
                        Route::post('deleteFaq', 'FaqController@deleteFaq')->name($scope . '.faq.question.delete');
                    }
                    if ($scope == 'user') {
                        Route::get('/', 'FaqController@index')->name($scope . '.faq');
                    }
                });
            });
    }
}

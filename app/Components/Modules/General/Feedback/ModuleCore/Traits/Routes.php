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

namespace App\Components\Modules\General\Feedback\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\General\Feedback\ModuleCore\Traits
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
                Route::group(['prefix' => 'feedback'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::get('table', 'FeedbackController@getFeedbackTable')->name('feedback.table');
                        Route::post('configform', 'FeedbackController@getConfigForm')->name('feedback.configform');
                        Route::post('saveFeedbackForm', 'FeedbackController@saveFeedbackForms')->name('feedback.saveForm');
                        Route::post('deleteFeedbackForm', 'FeedbackController@deleteFeedbackForm')->name('feedback.delete');

                        Route::post('manageQuestion', 'FeedbackController@manageFeedBackQuestions')->name('feedback.questionConfigForm');
                        Route::post('saveQuestion', 'FeedbackController@saveQuestion')->name('feedback.question.saveForm');
                        Route::post('deleteQuestion', 'FeedbackController@deleteQuestion')->name('feedback.question.delete');

                        Route::post('manageOption', 'FeedbackController@manageFeedBackOptions')->name('feedback.optionConfigForm');
                        Route::post('saveOption', 'FeedbackController@saveOption')->name('feedback.option.saveForm');
                        Route::post('deleteOption', 'FeedbackController@deleteOption')->name('feedback.option.delete');

                        Route::get('form/{id?}/{user_id?}', 'FeedbackController@showFeedbackForm')->name('feedback.userForm');
                        Route::post('saveuserFeedback', 'FeedbackController@saveUserFeedback')->name($scope . '.feedback.userFeedback.save');

                        Route::get('userFeedback', 'FeedbackController@showUserFeedback')->name('feedback.userFeedback');
                        Route::post('userfeedbackTable', 'FeedbackController@showUserFeedbackTable')->name('feedback.user.list');
                        Route::post('userfeedbackFilter', 'FeedbackController@showUserFeedbackFilter')->name('feedback.user.filter');

                        Route::get('manageFeedbackForm', 'FeedbackController@manageFeedbackForm')->name('feedback.manageFeedbackForm');
                    }

                    if ($scope == 'user') {
                        Route::get('feedbackForm/{id}', 'FeedbackController@showFeedbackForm')->name($scope . '.feedback');
                        Route::post('saveuserFeedback', 'FeedbackController@saveUserFeedback')->name($scope . '.feedback.userFeedback.save');
                    }
                });
            });
    }
}

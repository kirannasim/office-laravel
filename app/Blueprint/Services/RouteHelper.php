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

namespace App\Blueprint\Services;

use Illuminate\Support\Facades\Route;

/**
 * Class RouteHelper
 * @package App\Blueprint\Services
 */
class RouteHelper
{
    public $scope;

    /**
     * getting scope of route
     *
     * @return string $scope [description]
     */
    function getScope()
    {
        return $this->scope;
    }

    /**
     * setting scope of route
     *
     * @param string $scope [description]
     */
    function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * Handles user data insertion tasks
     *
     * @param $scope
     * @param $options
     */
    function authRoutes($scope, $options)
    {
        Route::group($options, function () use ($scope) {
            Route::group(['prefix' => $scope, 'namespace' => 'Auth'], function () use ($scope) {
                //Login routes
                Route::get('/', 'LoginController@showLoginForm')->name("$scope.redirect");
                Route::get('login', 'LoginController@showLoginForm')->name("$scope.login");
                Route::post('login', 'LoginController@login')->name("$scope.loginAction");
                Route::any('logout', 'LoginController@logout')->name("$scope.logout");
                // Registration Routes...
                Route::group(['prefix' => 'register'], function () use ($scope) {
                    Route::get('/', 'RegisterController@showRegistrationForm')
                        ->name("$scope.register");
                    Route::post('requestHandler', 'RegisterController@handleRequest')
                        ->name("$scope.register.request");
                    Route::post('/', 'RegisterController@register')->name($scope . 'registerAction');
                    Route::get('preview/{id}', 'RegisterController@registerPreview')
                        ->name("$scope.register.preview");
                    Route::get('gateways', 'RegisterController@gateways')
                        ->name("$scope.register.gateways");
                    Route::get('packages/{style?}', 'RegisterController@packages')
                        ->name("$scope.register.packages");
                });
                // Password Reset Routes...
                Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
                    ->name("$scope.password.request");
                Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
                    ->name("$scope.password.email");
                Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
                    ->name("$scope.password.reset");
                Route::post('password/reset', 'ResetPasswordController@reset')
                    ->name("$scope.password.reset.request");
            });
        });
    }
}

<?php

namespace App\Components\Modules\General\DownLineList\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

trait Routes
{
    /**
     * scope
     */
    function setRoutes()
    {
        foreach (getScopes()->except(['shared', 'user']) as $scope)
            Route::group(['prefix' => $scope, 'middleware' => "Routeserver:$scope"], function () use ($scope) {
                Route::group(['prefix' => 'downlineUsers'], function () use ($scope) {
                    if ($scope == 'admin') {
                        Route::post('downlineUsersFilter', 'DownLineListControllers@filters')->name("$scope.downlineUsers.filter");
                        Route::post('downlineUsers', 'DownLineListControllers@fetch')->name("$scope.downlineUsers.fetch");

                        Route::post('listDownLines', 'DownLineListControllers@getDownlines')->name($scope . '.DownLinesList.listDownLines');
                    }
                });
            });
    }
}

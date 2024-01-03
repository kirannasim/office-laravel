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

namespace App\Components\Modules\Report\TreeList\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\TreeList\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'Routeserver:admin'], function () {
            Route::group(['prefix' => 'treelist'], function () {
                Route::get('/', 'TreeListController@index')->name('treelist.table');
                Route::get('treeListFilter', 'TreeListController@getTreeListFilters')->name('treelist.filters');
                Route::post('treeListFilter', 'TreeListController@getDownlines')->name('treelist.downlines');
            });
        });
    }
}

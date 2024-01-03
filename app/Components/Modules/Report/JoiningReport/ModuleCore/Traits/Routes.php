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

namespace App\Components\Modules\Report\JoiningReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\JoiningReport\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'Routeserver:admin'], function () {
            Route::group(['prefix' => 'report'], function () {
                Route::get('joining', 'JoiningReportController@index')->name('report.joining');
                Route::get('joiningreportFilters', 'JoiningReportController@filters')->name('joiningReport.filters');
                Route::post('joiningReportTable', 'JoiningReportController@Fetch')->name('joiningReport.fetch');
                Route::post('downloadJoiningReportPdf', 'JoiningReportController@downloadJoiningReportPdf')->name('joiningReport.download.pdf');
                Route::post('downloadJoiningReportExcel', 'JoiningReportController@downloadJoiningReportExcel')->name('joiningReport.download.excel');
                Route::post('downloadJoiningReportCsv', 'JoiningReportController@downloadJoiningReportCsv')->name('joiningReport.download.csv');
                Route::post('printJoiningReport', 'JoiningReportController@printJoiningReport')->name('joiningReport.print');
            });
        });
    }
}

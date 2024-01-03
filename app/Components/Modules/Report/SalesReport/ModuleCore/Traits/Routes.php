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

namespace App\Components\Modules\Report\SalesReport\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Report\SalesReport\ModuleCore\Traits
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
                Route::get('sales', 'SalesReportController@index')->name('report.sales');
                Route::get('salesReportFilters', 'SalesReportController@filters')->name('salesReport.filters');
                Route::post('fetchSalesReport', 'SalesReportController@Fetch')->name('salesReport.fetch');
                Route::post('downloadSalesReportPdf', 'SalesReportController@downloadSalesReportPdf')->name('salesReport.download.pdf');
                Route::post('downloadSalesReportExcel', 'SalesReportController@downloadSalesReportExcel')->name('salesReport.download.excel');
                Route::post('downloadSalesReportCsv', 'SalesReportController@downloadSalesReportCsv')->name('salesReport.download.csv');
                Route::post('printSalesReportReport', 'SalesReportController@printSalesReport')->name('salesReport.print');


            });
        });
    }
}

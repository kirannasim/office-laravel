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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits;

use Illuminate\Support\Facades\Route;

/**
 * Trait Routes
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits
 */
trait Routes
{
    /**
     * Set routes
     */
    function setRoutes()
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'Routeserver:admin'], function () {
            //Rank-configuration
            Route::group(['prefix' => 'settings'], function () {
                Route::post('advance_rank_personalize', 'AdvancedRankController@updatePersonalizedSettings')->name('settings.advance_rank_personalize');
            });

            Route::group(['prefix' => 'advancedRank'], function () {
                Route::post('advancedRankConfiguration', 'AdvancedRankController@rankConfiguration')->name("advancedRank.rankConfiguration");
                Route::post('advancedRankConfigurationSave', 'AdvancedRankController@rankConfigurationSave')->name('advancedRank.rankConfigurationSave');
                Route::post('rankBenefitConfiguration', 'AdvancedRankController@benefitConfig')->name('advancedRank.rankBenefitConfiguration');
                Route::post('rankBenefitConfigurationSave', 'AdvancedRankController@rankBenefitConfigurationSave')->name('advancedRank.rankBenefitConfigurationSave');

                Route::get('advancedRankReport', 'AdvancedRankController@rankReportIndex')->name('advancedRankReport');
                Route::get('advancedRankReportFilters', 'AdvancedRankController@rankReportFilters')->name('advancedRankReport.filters');
                Route::post('fetchRankReport', 'AdvancedRankController@fetchRankReport')->name('advancedRankReport.fetch');
                Route::post('RankReportPdf', 'AdvancedRankController@downloadRankReportPdf')->name('advancedRankReport.download.pdf');
                Route::post('RankReportExcel', 'AdvancedRankController@downloadRankReportExcel')->name('advancedRankReport.download.excel');
                Route::post('RankReportCsv', 'AdvancedRankController@downloadRankReportHistoryCsv')->name('advancedRankReport.download.csv');
                Route::post('printRankReport', 'AdvancedRankController@printRankReportHistory')->name('advancedRankReport.print');


                Route::get('advancedRankAchievementHistoryReport', 'AdvancedRankController@rankAchievementHistoryReportIndex')->name('advancedRankAchievementHistoryReport');
                Route::get('advancedRankAchievementHistoryReportFilters', 'AdvancedRankController@rankAchievementHistoryReportFilters')->name('advancedRankAchievementHistoryReport.filters');
                Route::post('fetchRankAchievementHistoryReport', 'AdvancedRankController@fetchRankAchievementHistoryReport')->name('advancedRankAchievementHistoryReport.fetch');
                Route::post('advancedRankAchievementHistoryReportPdf', 'AdvancedRankController@downloadRankAchievementHistoryReportPdf')->name('advancedRankAchievementHistoryReport.download.pdf');
                Route::post('RankAchievementHistoryReportExcel', 'AdvancedRankController@downloadRankAchievementHistoryReportExcel')->name('advancedRankAchievementHistoryReport.download.excel');
                Route::post('RankAchievementHistoryReportCsv', 'AdvancedRankController@downloadRankAchievementHistoryReportCsv')->name('advancedRankAchievementHistoryReport.download.csv');
                Route::post('printRankAchievementHistoryReport', 'AdvancedRankController@printRankAchievementHistoryReport')->name('advancedRankAchievementHistoryReport.print');


                Route::get('totalRankSummaryReport', 'AdvancedRankController@totalRankSummaryReportIndex')->name('totalRankSummaryReport');
                Route::get('totalRankSummaryReportFilters', 'AdvancedRankController@totalRankSummaryReportFilters')->name('totalRankSummaryReport.filters');
                Route::post('fetchRankSummaryReport', 'AdvancedRankController@fetchTotalRankSummaryReport')->name('totalRankSummaryReport.fetch');

            });
        });
    }
}
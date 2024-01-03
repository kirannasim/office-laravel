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

namespace App\Components\Modules\Layout\SalesBlocks\ModuleCore\Traits;

use App\Blueprint\Services\ModuleServices;

/**
 * Trait Hooks
 * @package App\Components\Modules\Layout\SalesBlocks\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers required hooks
     *
     * @return void
     */
    function hooks()
    {
        if (strtolower(getScope()) != 'admin') return;

        registerFilter('dashboardBlock', function ($content) {
            if (!app(ModuleServices::class)->getWalletPool()) return $content;

            return $content . '<li class="graphNav" data-unit="salesDetailedGraph">
                    <i class="fa fa-bar-chart-o"></i>
                    <p>' . _mt($this->moduleId, 'SalesBlocks.sales_info') . '</p>
                </li>';
        }, 'detailedGraphsNav');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'salesDetailedGraph') return $content;

            return $content . app()->call([$this, 'salesDetailedGraph']);
        }, 'unitFilter');
    }
}

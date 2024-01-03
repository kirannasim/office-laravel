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

namespace App\Components\Modules\Layout\CommissionBlocks\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Layout\CommissionBlocks\ModuleCore\Traits
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
        registerFilter('dashboardBlock', function ($content) {
            return $content . '<li class="graphNav" data-unit="commissionDetailedGraph">
                    <i class="fa fa-share-alt"></i>
                    <p>' . _mt($this->moduleId, 'CommissionBlocks.commission_info') . '</p>
                </li>';
        }, 'detailedGraphsNav');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'commissionDetailedGraph') return $content;

            return $content . app()->call([$this, 'commissionDetailedGraph']);
        }, 'unitFilter');
    }
}
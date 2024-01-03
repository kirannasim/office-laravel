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

namespace App\Components\Modules\Layout\UserJoiningBlocks\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Layout\UserJoiningBlocks\ModuleCore\Traits
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
            return $content . app()->call([$this, 'dashboardUserJoiningTile']);
        }, 'dashboardTile');

        registerFilter('dashboardBlock', function ($content) {
            return $content . '<li class="graphNav" data-unit="userDetailedGraph">
                    <i class="fa fa-user"></i>
                    <p>' . _mt($this->moduleId, 'UserJoiningBlocks.IB/Affiliate Info') . '</p>
                </li>';
        }, 'detailedGraphsNav');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'userDetailedGraph') return $content;

            return $content . app()->call([$this, 'userDetailedGraph']);
        }, 'unitFilter');

        registerFilter('dashboardBlock', function ($content) {
            return $content . '<div class="col-lg-7 col-xs-12 col-sm-12 userJoiningsHolder">
            <div class="innerHolder unitHolder" data-unit="userJoinings"></div>
        </div>';
        }, 'detailsBlock2');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'userJoinings') return $content;

            return $content . app()->call([$this, 'userJoinings']);
        }, 'unitFilter');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'userInfo') return $content;

            return $content . app()->call([$this, 'userInfo']);
        }, 'unitFilter');
    }
}
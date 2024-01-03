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

namespace App\Components\Modules\Layout\TopEarnersAndTopSponsors\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Layout\TopEarnersAndTopSponsors\ModuleCore\Traits
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
            return $content . '<div class="row earnersAndSponsors">
        <div class="innerHolder unitHolder" data-unit="topEarnersAndTopSponsors" data-loader-bg="none"></div>
    </div>';
        }, 'detailsBlock1');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'topEarnersAndTopSponsors') return $content;

            return $content . app()->call([$this, 'topEarnersAndTopSponsors']);
        }, 'unitFilter');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'sponsorInfo') return $content;

            return $content . app()->call([$this, 'sponsorInfo']);
        }, 'unitFilter');

        registerFilter('dashboardLayout', function ($content, $unit) {
            if ($unit != 'userEarningsInfo') return $content;

            return $content . app()->call([$this, 'userEarningsInfo']);
        }, 'unitFilter');
    }
}

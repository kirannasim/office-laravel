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

namespace App\Components\Modules\Layout\BinaryInfoBlocks\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Layout\BinaryInfoBlocks\ModuleCore\Traits
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
            return $content . app()->call([$this, 'dashboardBinaryInfoTile']);
        }, 'dashboardTile', 4);
    }
}
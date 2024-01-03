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

/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 4/4/2018
 * Time: 12:48 PM
 */

namespace App\Blueprint\Traits\Graph;

use Carbon\Carbon;

/**
 * Trait DateTimeFormatter
 * @package App\Blueprint\Traits\Graph
 */
trait DateTimeFormatter
{
    /**
     * @param string $monthFormat
     * @return array
     */
    function getMonths($monthFormat = 'M')
    {
        return array_map(function ($value) use ($monthFormat) {
            return Carbon::now()->month($value)->format($monthFormat);
        }, range(1, 12));
    }

    /**
     * @param string $dayFormat
     * @return array
     */
    function getDays($dayFormat = 'D')
    {
        return array_map(function ($value) use ($dayFormat) {
            return Carbon::now()->day($value)->format($dayFormat);
        }, range(1, 7));
    }
}

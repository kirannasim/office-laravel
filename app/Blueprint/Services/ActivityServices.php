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

namespace App\Blueprint\Services;

use App\Eloquents\ActivityHistory;
use Carbon\Carbon;
use Illuminate\Support\Collection;


/**
 * Class ActivityServices
 * @package App\Blueprint\Services
 */
class ActivityServices
{
    /**
     * @param Collection $options
     * @return ActivityHistory|\Illuminate\Database\Eloquent\Builder
     */
    function getActivities(Collection $options)
    {
        $defaults = collect([
            'fromDate' => (new ActivityHistory)->min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
        ]);
        $options = $defaults->merge($options);

        return ActivityHistory::with('user')->orderBy($options->get('sortBy'), $options->get('orderBy'));
    }
}

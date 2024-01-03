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

use App\Eloquents\Notification;
use Carbon\Carbon;
use Illuminate\Support\Collection;


/**
 *
 * Class NotificationServices
 * @package App\Blueprint\Services
 */
class NotificationServices
{
    /**
     * @param Collection $options
     * @return Notification
     */
    function getNotifications(Collection $options)
    {
        $defaults = collect([
            'fromDate' => (new Notification)->min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
        ]);
        $options = $defaults->merge($options);

        return Notification::orderBy($options->get('sortBy'), $options->get('orderBy'));
    }
}
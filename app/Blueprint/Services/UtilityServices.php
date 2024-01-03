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

use App\Blueprint\Query\Builder;
use App\Eloquents\Activity;
use App\Eloquents\ActivityHistory;
use Illuminate\Support\Facades\Request;


/**
 * Class UtilityServices
 * @package App\Blueprint\Services
 */
class UtilityServices
{
    /**
     * @param $operation
     * @param array $data
     * @param null $userId
     */
    function setActivityHistory($operation, $data = [], $userId = null, $on_user_id = 0)
    {
        $userId = $userId ?: loggedId();
        $operation = is_int($operation) ? $operation : Activity::operationToId($operation);

        ActivityHistory::create([
            'activity_id' => $operation,
            'user_id' => $userId,
            'data' => $data,
            'ip' => Request::ip(),
            'on_user_id' =>$on_user_id,
        ]);
    }

    /**
     * @param array $options
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    function getActivityHistories($options = [], $query = null)
    {
        $defaults = collect([
            'fromDate' => ActivityHistory::min('created_at'),
            'toDate' => ActivityHistory::max('created_at'),
        ]);
        $options = $defaults->merge($options);
        /** @var Builder $query */
        $query = $query ?: ActivityHistory::query();

        return $query->with('activity')
            ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($visibility = $options->get('visibility'), function ($query) use ($visibility) {
                /** @var Builder $query */
                $query->where('visibility', $visibility);
            })
            ->when($userId = $options->get('userId'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            });
    }
}

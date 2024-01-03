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

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CronHistory
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $cron_id
 * @property array $response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory whereCronId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CronHistory extends Model
{
    protected $table = 'cron_history';

    protected $casts = [
        'response' => 'array'
    ];

    protected $guarded = [];
}

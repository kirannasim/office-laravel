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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CronJob
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $minute
 * @property string $hour
 * @property string $day
 * @property string $month
 * @property string $weekday
 * @property string|null $url
 * @property string|null $task
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\CronJob onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CronJob whereWeekday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\CronJob withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\CronJob withoutTrashed()
 * @mixin \Eloquent
 */
class CronJob extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}

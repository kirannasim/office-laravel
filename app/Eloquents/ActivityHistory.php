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
 * Class ActivityHistory
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $activity_id
 * @property int $user_id
 * @property array $data
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\Activity $activity
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ActivityHistory whereUserId($value)
 * @mixin \Eloquent
 */
class ActivityHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'activity_history';

    protected $casts = [
        'data' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}

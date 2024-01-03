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
 * Class Activity
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $operation
 * @property string $description
 * @property int $priority
 * @property int $visibility
 * @property string $ip
 * @property string|null $icon
 * @property string|null $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\ActivityHistory[] $histories
 * @property-read int|null $histories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Activity whereVisibility($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @param $operation
     * @return bool|mixed
     */
    static function operationToId($operation)
    {
        return ($result = static::where('operation', $operation)->first()) ? $result->id : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function histories()
    {
        return $this->hasMany(ActivityHistory::class);
    }
}

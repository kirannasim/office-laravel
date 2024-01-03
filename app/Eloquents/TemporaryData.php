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
 * Class Transaction
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $key
 * @property array|null $value
 * @property int $status
 * @property string $context
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TemporaryData whereValue($value)
 * @mixin \Eloquent
 */
class TemporaryData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'temporary_data';

    protected $casts = [
        'value' => 'array'
    ];
}

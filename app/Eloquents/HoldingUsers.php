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
 * Class Activity
 *
 * @package App\Eloquents
 * @property int $id
 * @property int|null $sponsor_id
 * @property string $username
 * @property string $email
 * @property array $data
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\HoldingUsers onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\HoldingUsers whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\HoldingUsers withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\HoldingUsers withoutTrashed()
 * @mixin \Eloquent
 */
class HoldingUsers extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $timestamp = true;

    protected $casts = [
        'data' => 'array',
    ];
}

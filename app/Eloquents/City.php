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

use App\Blueprint\Traits\Model\Helpers;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int $state_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereStateId($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    use Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'cities';
}

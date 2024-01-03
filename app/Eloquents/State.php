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
 * Class State
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int $country_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereName($value)
 * @mixin \Eloquent
 */
class State extends Model
{
    use Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'states';
}

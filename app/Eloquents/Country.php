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
 * Class Country
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $phonecode
 * @property string $phonemask
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country wherePhonecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Country wherePhonemask($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    use Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'countries';
}

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
 * Class Currency
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $symbol
 * @property string $format
 * @property string $exchange_rate
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'currencies';

}

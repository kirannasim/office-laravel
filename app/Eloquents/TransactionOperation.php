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
 * Class TransactionOperation
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $slug
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionOperation whereTitle($value)
 * @mixin \Eloquent
 */
class TransactionOperation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;

    /**
     * @param $slug
     * @return bool|mixed
     */
    static function slugToId($slug)
    {
        return ($result = static::where('slug', $slug)->first()) ? $result->id : false;
    }
}

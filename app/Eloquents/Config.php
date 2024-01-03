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
 * Class Config
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $meta_key
 * @property string $meta_value
 * @property string $group
 * @property string $status
 * @property int $serialized
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereSerialized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Config whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Config extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'config';

    /**
     * Config Field relation
     * @return Eloquent relation
     */

    function configField()
    {
        $this->hasOne(ConfigField::class);
    }
}

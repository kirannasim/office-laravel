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
 * Class UserRole
 *
 * @package App\Eloquents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserStatus query()
 * @mixin \Eloquent
 */
class UserStatus extends Model
{
    protected $guarded = [];

    protected $table = 'user_status';

    protected static function boot()
    {
        parent::boot();
    }
}

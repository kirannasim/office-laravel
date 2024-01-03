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
 * Class PresetUser
 *
 * @package App\Eloquents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetUser query()
 * @mixin \Eloquent
 */
class PresetUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'preset_users';
}

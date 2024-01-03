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
 * Class CapturePages
 *
 * @package App\Eloquents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CapturePages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CapturePages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CapturePages query()
 * @mixin \Eloquent
 */
class CapturePages extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'capture_pages';
}

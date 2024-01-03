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

namespace App\Components\Modules\General\Payout\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;


/**
 * Class PayoutRequest
 *
 * @package App\Components\Modules\General\Payout\ModuleCore\Eloquents
 * @property int $id
 * @property string $slug
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus whereTitle($value)
 * @mixin \Eloquent
 */
class PayoutStatus extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'payout_status';

    /**
     * @param $slug
     * @return PayoutRequest
     */
    static function getIdFromSlug($slug)
    {
        return static::where('slug', $slug)->first()->id;
    }

    /**
     * @param $id
     * @return PayoutRequest
     */
    static function getSlugFromId($id)
    {
        return static::find($id)->slug;
    }
}

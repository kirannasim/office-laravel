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

namespace App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ChangeSponsorHistory
 *
 * @package App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $from_sponsor
 * @property int $to_sponsor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereFromSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereToSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory whereUserId($value)
 * @mixin \Eloquent
 */
class ChangeSponsorHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'change_sponsor_history';
}
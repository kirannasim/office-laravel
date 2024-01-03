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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AdvancedRankUser
 *
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $rank_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank $rank
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser whereRankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser whereUserId($value)
 * @mixin \Eloquent
 */
class AdvancedRankUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'advanced_rank_users';

    /**
     * @return BelongsTo
     */
    function rank()
    {
        return $this->belongsTo(AdvancedRank::class);
    }

    /**
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
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

use App\Eloquents\Country;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AdvancedRankAchievementHistory
 *
 * @package App\Components\Modules\Rank\AdvancedRankBenefit\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $rank_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\Country $country
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank $rank
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereRankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory whereUserId($value)
 * @mixin \Eloquent
 */
class AdvancedRankAchievementHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'advanced_rank_achievement_history';

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

    /**
     * @return BelongsTo
     */
    function userMeta()
    {
        return $this->belongsTo(UserMeta::class,'user_id','user_id');
    }


    /**
     * @return BelongsTo
     */
    function country()
    {
        return $this->belongsTo(Country::class);
    }
}
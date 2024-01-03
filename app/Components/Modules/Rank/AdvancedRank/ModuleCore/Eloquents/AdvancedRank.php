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

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * Class AdvancedRank
 *
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int|null $referral_rank
 * @property int|null $referral_rank_count
 * @property int $minimum_leg_count
 * @property int $is_active
 * @property int|null $benefit
 * @property int $accumulated_cycle
 * @property int $accumulated_cycle_preceding
 * @property int $need_active_referrals
 * @property int $second_referral_rank
 * @property int $second_referral_rank_count
 * @property int $second_referral_min_count
 * @property int $sponsor_line
 * @property int $sponsor_line_rank
 * @property int $investment_clients
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereAccumulatedCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereAccumulatedCyclePreceding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereInvestmentClients($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereMinimumLegCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereNeedActiveReferrals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereReferralRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereReferralRankCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereSecondReferralMinCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereSecondReferralRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereSecondReferralRankCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereSponsorLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereSponsorLineRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank withoutTrashed()
 * @mixin \Eloquent
 */
class AdvancedRank extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function getBenefit(): BelongsTo
    {
        return $this->belongsTo(AdvancedRankBenefit::class, 'benefit');
    }


    /**
     * @return HasMany
     */

    public function rankHistory(): HasMany
    {
        return $this->hasMany(AdvancedRankAchievementHistory::class, 'rank_id', 'id');
    }


}

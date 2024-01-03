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
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class AdvancedRankBenefit
 *
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents
 * @property int $id
 * @property string $name
 * @property float $value
 * @property string|null $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank[] $ranks
 * @property-read int|null $ranks_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit whereValue($value)
 * @mixin \Eloquent
 */
class AdvancedRankBenefit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function ranks(): HasMany
    {
        return $this->hasMany(AdvancedRank::class);
    }
}

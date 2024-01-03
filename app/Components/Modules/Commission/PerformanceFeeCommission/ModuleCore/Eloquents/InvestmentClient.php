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

namespace App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InvestmentClient
 *
 * @package App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property int $sponsor_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi[] $profit
 * @property-read int|null $profit_count
 * @property-read \App\Eloquents\User $sponsor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient withoutTrashed()
 * @mixin \Eloquent
 */
class InvestmentClient extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    function profit()
    {
        return $this->hasMany(InvestmentRoi::class, 'id', 'client_id');
    }

    /**
     * @return BelongsTo
     */
    function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }
}
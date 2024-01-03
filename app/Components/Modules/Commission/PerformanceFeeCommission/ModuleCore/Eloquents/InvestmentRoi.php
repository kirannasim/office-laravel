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

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class InvestmentRoi
 *
 * @package App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents
 * @property int $id
 * @property int $client_id
 * @property float|null $invested_amount
 * @property float $profit
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereInvestedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvestmentRoi extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'investment_roi';

    /**
     * @return BelongsTo
     */
    function client()
    {
        return $this->belongsTo(InvestmentClient::class, 'client_id');
    }
}
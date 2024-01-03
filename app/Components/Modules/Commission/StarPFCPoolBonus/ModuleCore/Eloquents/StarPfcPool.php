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

namespace App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StarPfcPool
 *
 * @package App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents
 * @property int $id
 * @property float $amount
 * @property int $investment_id
 * @property int $is_distributed
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereInvestmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereIsDistributed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool withoutTrashed()
 * @mixin \Eloquent
 */
class StarPfcPool extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'star_pfc_pool';
}
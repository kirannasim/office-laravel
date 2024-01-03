<?php


namespace App\Components\Modules\General\MiniHoldingTank\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HoldingTank
 *
 * @package App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents
 * @property-read \App\Eloquents\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank withoutTrashed()
 * @mixin \Eloquent
 */
class HoldingTank extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $table = 'holding_tank';

    function user()
    {
        return $this->belongsTo(User::class);
    }

}

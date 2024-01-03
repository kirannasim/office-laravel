<?php

namespace App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InvestmentClient
 *
 * @package App\Components\Modules\Report\ModuleCore\ClientReport\Eloquents
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property int $sponsor_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvestmentClient extends Model
{
    protected $guarded = [];

    protected $table = 'investment_clients';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
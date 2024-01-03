<?php

namespace App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Founder
 *
 * @package App\Components\Modules\Report\ModuleCore\FoundersLaunchReport\Eloquents
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property int $sponsor_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Eloquents\Founder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Founder extends Model
{
    protected $guarded = [];

    protected $table = 'founders_launch';


}
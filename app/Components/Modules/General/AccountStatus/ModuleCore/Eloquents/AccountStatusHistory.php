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

namespace App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Autoresponder
 *
 * @package App\Components\Modules\General\AutoResponder\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property string|null $status
 * @property array|null $permissions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Eloquents\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory withoutTrashed()
 * @mixin \Eloquent
 */
class AccountStatusHistory extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'account_status_history';

    protected $guarded = [];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Xoom\ModuleCore\Eloquents;


use App\Components\Modules\General\Xoom\XoomIndex as Module;
use App\Eloquents\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $xoom_user_id
 * @property string|null $access_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|XoomUser onlyTrashed()
 * @method static bool|null restore()
 * @method static Builder|XoomUser whereAccessToken($value)
 * @method static Builder|XoomUser whereCreatedAt($value)
 * @method static Builder|XoomUser whereDeletedAt($value)
 * @method static Builder|XoomUser whereId($value)
 * @method static Builder|XoomUser whereUpdatedAt($value)
 * @method static Builder|XoomUser whereUserId($value)
 * @method static Builder|XoomUser whereXoomUserId($value)
 * @method static \Illuminate\Database\Query\Builder|XoomUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|XoomUser withoutTrashed()
 * @mixin Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser query()
 */
class XoomUser extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['user_id'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array'

    ];

    protected $module;
    protected $module_config = [];

    /**
     * __construct function
     */
    public function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
        $this->module_config = collect(getModule($this->module->moduleId)->getModuleData(true));
    }

    protected $fillable = [
        'user_id', 'access_token'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function generateXoomPassword(): string
    {
        $salt = 'dmsKW231WRE12!@swcWEC.w';
        return 'X9' . md5($this->user_id . $this->user->created_at . $salt) . '!@_w';
    }
}

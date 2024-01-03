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

namespace App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BinaryPoint
 *
 * @package App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property float $point
 * @property int $position
 * @property int $is_credit
 * @property float $pair
 * @property float $possible_pair
 * @property int|null $from_user
 * @property string|null $context
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\User|null $fromUser
 * @property-read \App\Eloquents\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereFromUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereIsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint wherePair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint wherePossiblePair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint withoutTrashed()
 * @mixin \Eloquent
 * @property int $pair_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint wherePairId($value)
 */
class BinaryPoint extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     *
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

}

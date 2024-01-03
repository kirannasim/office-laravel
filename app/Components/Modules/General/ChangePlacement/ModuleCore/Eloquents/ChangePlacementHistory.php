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

namespace App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents;

use App\Eloquents\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ChangePlacementHistory
 *
 * @package App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $from_parent
 * @property int $to_parent
 * @property int $from_position
 * @property int $to_position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\User $fromParent
 * @property-read \App\Eloquents\User $toParent
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereFromParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereFromPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereToParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereToPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory whereUserId($value)
 * @mixin \Eloquent
 */
class ChangePlacementHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'change_placement_history';

    /**
     * User Relation
     *
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User Relation
     *
     * @return BelongsTo
     */
    function fromParent()
    {
        return $this->belongsTo(User::class, 'from_parent');
    }

    /**
     * User Relation
     *
     * @return BelongsTo
     */
    function toParent()
    {
        return $this->belongsTo(User::class, 'to_parent');
    }
}

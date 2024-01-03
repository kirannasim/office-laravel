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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents;

use App\Eloquents\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class BinaryPositionSelectorHistory
 *
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $from_selector
 * @property int $to_selector
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|BinaryPositionSelectorHistory newModelQuery()
 * @method static Builder|BinaryPositionSelectorHistory newQuery()
 * @method static Builder|BinaryPositionSelectorHistory query()
 * @method static Builder|BinaryPositionSelectorHistory whereCreatedAt($value)
 * @method static Builder|BinaryPositionSelectorHistory whereFromSelector($value)
 * @method static Builder|BinaryPositionSelectorHistory whereId($value)
 * @method static Builder|BinaryPositionSelectorHistory whereToSelector($value)
 * @method static Builder|BinaryPositionSelectorHistory whereUpdatedAt($value)
 * @method static Builder|BinaryPositionSelectorHistory whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector $from
 * @property-read \App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector $to
 */
class BinaryPositionSelectorHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'binary_position_selector_history';

    /**
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    function from()
    {
        return $this->belongsTo(BinaryPositionSelector::class, 'from_selector');
    }

    /**
     * @return BelongsTo
     */
    function to()
    {
        return $this->belongsTo(BinaryPositionSelector::class, 'to_selector');
    }
}
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

namespace App\Eloquents;

use App\Blueprint\Services\ModuleServices;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commission
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $transaction_id
 * @property int $module_id
 * @property int $ref_user_id
 * @property string|null $deleted_at
 * @property-read \App\Eloquents\User $referenceUser
 * @property-read \App\Eloquents\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission whereRefUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Commission whereTransactionId($value)
 * @mixin \Eloquent
 */
class Commission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * @return mixed
     */
    function module()
    {
        return app(ModuleServices::class)->callModule($this->module_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function referenceUser()
    {
        return $this->belongsTo(User::class, 'ref_user_id');
    }
}

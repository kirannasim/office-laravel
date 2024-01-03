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

use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionCharge
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $transaction_id
 * @property int $module_id
 * @property float $amount
 * @property int $is_credit
 * @property-read \App\Eloquents\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge whereIsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionCharge whereTransactionId($value)
 * @mixin \Eloquent
 */
class TransactionCharge extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * @return bool
     */
    function module()
    {
        return callModule($this->module_id);
    }
}

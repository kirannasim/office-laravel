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
 * Class TransactionDetail
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $transaction_id
 * @property string|null $remarks
 * @property int $from_module
 * @property int $to_module
 * @property int $operation_id
 * @property-read \App\Eloquents\TransactionOperation $operationDetails
 * @property-read \App\Eloquents\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereFromModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereOperationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereToModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\TransactionDetail whereTransactionId($value)
 * @mixin \Eloquent
 */
class TransactionDetail extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function operationDetails()
    {
        return $this->belongsTo(TransactionOperation::class, 'operation_id');
    }
}

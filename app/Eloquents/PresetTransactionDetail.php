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
 * Class PresetTransactionsDetail
 *
 * @package App\Eloquents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetTransactionDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetTransactionDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\PresetTransactionDetail query()
 * @mixin \Eloquent
 */
class PresetTransactionDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'preset_transaction_details';
}

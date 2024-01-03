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

namespace App\Components\Modules\General\Payout\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PayoutRequest
 *
 * @package App\Components\Modules\General\Payout\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property float $request_amount
 * @property float $release_amount
 * @property int $wallet
 * @property int $gateway
 * @property string $remark
 * @property int $status
 * @property int $transaction_id
 * @property int $account
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus $payoutStatus
 * @property-read \App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction $transaction
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereReleaseAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereRequestAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest whereWallet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest withoutTrashed()
 * @mixin \Eloquent
 */
class PayoutRequest extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'payout_requests';

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
    function payoutStatus()
    {
        return $this->belongsTo(PayoutStatus::class, 'status');
    }
}

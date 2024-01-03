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

/**
 * Class Transaction
 *
 * @package App\Components\Modules\General\Payout\ModuleCore\Eloquents
 * @property int $id
 * @property int $payer
 * @property int $payee
 * @property string $context
 * @property int $gateway
 * @property float $amount
 * @property float $actual_amount
 * @property string $ip
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\TransactionCharge[] $charges
 * @property-read int|null $charges_count
 * @property-read \App\Eloquents\Commission $commission
 * @property-read \App\Eloquents\TransactionDetail $operation
 * @property-read \App\Eloquents\Order $order
 * @property-read \App\Eloquents\User $payeeUser
 * @property-read \App\Eloquents\User $payerUser
 * @property-read \App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest $payoutRequest
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereActualAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction wherePayee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction wherePayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaction extends \App\Eloquents\Transaction
{
    /**
     * Payout Request Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function payoutRequest()
    {
        return $this->hasOne(PayoutRequest::class, 'transaction_id');
    }
}

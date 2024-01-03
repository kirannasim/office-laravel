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

use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 *
 * @package App\Eloquents
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
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereActualAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction wherePayee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction wherePayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Transaction withoutTrashed()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function charges()
    {
        return $this->hasMany(TransactionCharge::class);
    }

    /**
     * @return mixed
     */
    function operation()
    {
        return $this->hasOne(TransactionDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function payerUser()
    {
        return $this->belongsTo(User::class, 'payer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function payeeUser()
    {
        return $this->belongsTo(User::class, 'payee');
    }

    /**
     * @param User $user
     * @param WalletModuleInterface $wallet
     * @return string
     */
    function isCreditFor(User $user, WalletModuleInterface $wallet)
    {
        if ($this->payee == $this->payer) {
            if (in_array(User::companyUser()->id, [$this->payee, $this->payer]))
                return true;
            elseif ($this->operation->from_module == $wallet->moduleId)
                return false;
            elseif ($this->operation->from_module == $wallet->moduleId)
                return true;
        }

        return ($this->payee == $user->id) ? true : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function commission()
    {
        return $this->hasOne(Commission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function order()
    {
        return $this->hasOne(Order::class);
    }
}

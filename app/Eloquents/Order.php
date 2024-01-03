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

use Baum\Extensions\Eloquent\Collection;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Traversable;

/**
 * Class Order
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $transaction_id
 * @property int $status
 * @property string $ip
 * @property string $order_type
 * @property string $user_agent
 * @property string $payment_gateway
 * @property float $total
 * @property float $subtotal
 * @property float $discount
 * @property int $isPackage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Transaction $transaction
 * @property-read User $user
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDiscount($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereIp($value)
 * @method static Builder|Order whereIsPackage($value)
 * @method static Builder|Order whereOrderType($value)
 * @method static Builder|Order wherePaymentGateway($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereSubtotal($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereTransactionId($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserAgent($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Eloquents\UserMeta $metaData
 */
class Order extends Model
{
    protected $guarded = [];

    /**
     * Products relation
     *
     * @param bool|array|collection $data
     * @return array|HasMany|Traversable
     */
    function products($data = false)
    {
        if (!$data) return $this->hasMany(OrderProduct::class);

        return $this->products()->saveMany($data);
    }

    /**
     * Order totals relation
     *
     * @param array|bool $data
     * @param null $type
     * @return array|HasMany|Traversable
     */
    function totals(array $data = null, $type = Null)
    {
        if ($data == null) return $this->hasMany(OrderTotal::class);

        $data = array_map(function ($value) use ($type) {
            return OrderTotal::make(array_merge($value, ['type' => $type]));
        }, $data);

        return $this->totals()->saveMany($data);
    }

    /**
     * Get transaction related to an order
     *
     * @return BelongsTo
     */
    function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

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
    function metaData()
    {
        return $this->belongsTo(UserMeta::class, 'user_id', 'user_id');
    }
}
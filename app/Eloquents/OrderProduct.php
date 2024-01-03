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

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Traversable;

/**
 * Class OrderProduct
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $order_type
 * @property float $price
 * @property float $pv
 * @property float $subtotal
 * @property float $total
 * @property float $discount
 * @property int $is_package
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Package $item
 * @property-read Package $package
 * @method static Builder|OrderProduct newModelQuery()
 * @method static Builder|OrderProduct newQuery()
 * @method static Builder|OrderProduct query()
 * @method static Builder|OrderProduct whereCreatedAt($value)
 * @method static Builder|OrderProduct whereDiscount($value)
 * @method static Builder|OrderProduct whereId($value)
 * @method static Builder|OrderProduct whereIsPackage($value)
 * @method static Builder|OrderProduct whereOrderId($value)
 * @method static Builder|OrderProduct whereOrderType($value)
 * @method static Builder|OrderProduct wherePrice($value)
 * @method static Builder|OrderProduct whereProductId($value)
 * @method static Builder|OrderProduct wherePv($value)
 * @method static Builder|OrderProduct whereQuantity($value)
 * @method static Builder|OrderProduct whereSubtotal($value)
 * @method static Builder|OrderProduct whereTotal($value)
 * @method static Builder|OrderProduct whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \App\Eloquents\Order $order
 */
class OrderProduct extends Model
{
    protected $guarded = [];

    /**
     * Order totals relation
     *
     * @param array|bool $data
     * @param null $type
     * @return array|HasMany|Traversable
     */
    public function totals(array $data = null, $type = Null)
    {
        if ($data == null) {
            return $this->hasMany(OrderTotal::class, 'opid');
        }

        $data = array_map(function ($value) use ($type) {
            return OrderTotal::make(array_merge($value, ['type' => $type, 'order_id' => $this->order_id]));
        }, $data);

        return $this->totals()->saveMany($data);
    }

    /**
     * @return BelongsTo
     */
    public function item()
    {
        if ($this->is_package) {
            return $this->belongsTo(Package::class, 'product_id');
        }
        return $this->belongsTo(Package::class, 'product_id');
//        return $this->belongsTo(Product::class, 'product_id'); there is no such model
    }

    /**
     * @return BelongsTo
     */
    function package()
    {
        return $this->belongsTo(Package::class, 'product_id');
    }

    /**
     * @return BelongsTo
     */
    function order()
    {
        return $this->belongsTo(Order::class, 'order_id',);
    }
}

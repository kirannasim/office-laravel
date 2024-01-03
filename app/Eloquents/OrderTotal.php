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

use App\Blueprint\Interfaces\Module\CartTotalInterface;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTotal
 * @package App\Eloquents
 */
class OrderTotal extends Model
{
    protected $guarded = [];

    protected $table = 'order_totals';

    public $timestamps = false;

    /**
     * Products relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Product data relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(OrderProduct::class, 'opid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function totalModule()
    {
        return $this->belongsTo(Module::class, 'module');
    }

    /**
     * @return \App\Blueprint\Interfaces\Module\ModuleBasicAbstract|CartTotalInterface
     */
    public function module()
    {
        return callModule($this->module);
    }
}

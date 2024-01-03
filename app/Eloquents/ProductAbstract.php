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

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductAbstract
 * @package App\Eloquents
 */
abstract class ProductAbstract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get package active discount from all available discounts
     *
     * @return bool|mixed
     */
    function getDiscount()
    {
        if (!$this->discount) return false;

        foreach ($this->discount->sortBy('priority') as $discount) {
            $now = Carbon::now();
            if ($now >= $discount['start_date'] && $now <= $discount['end_date']) {
                return [
                    'title' => $discount['title'],
                    'amount' => ($discount['type'] === 'f') ? $discount['amount'] : ($this->price * ($discount['amount'] / 100)),
                    'description' => $discount['description'],
                ];
            }
        };
        return false;
    }

    /**
     * Get package tax
     *
     * @return bool|mixed
     */
    function getTax()
    {
        $tax = $this->tax;
        if (!$tax) return false;

        return [
            'title' => $tax['description'],
            'amount' => ($tax['type'] === 'f') ? $tax['amount'] : ($this->price * ($tax['amount'] / 100)),
            'description' => $tax['description'],
        ];
    }

    /**
     * Get package tax
     *
     * @return bool|mixed
     */
    function getFee()
    {
        $fee = $this->fee;
        if (!$fee) return false;

        return [
            'title' => $fee['description'],
            'amount' => ($fee['type'] === 'f') ? $fee['amount'] : ($this->price * ($fee['amount'] / 100)),
            'description' => $fee['description'],
        ];
    }

    /**
     * Get package shipping charge
     *
     * @return bool|mixed
     */
    function getShippingCharge()
    {
        /* $charge = $this->shipping_charge;

         if (!$charge) return false;

         return ($charge['type'] == 'f') ? $charge['amount'] : ($this->price * ($charge['amount'] / 100));*/
        dd($this->shipping_charge);
        if (!$this->shipping_charge) return false;

        foreach ($this->shipping_charge->sortBy('priority') as $shippigCharge) {
            $now = Carbon::now();
            if ($now >= $shippigCharge['start_date'] && $now <= $shippigCharge['end_date']) {
                return [
                    'title' => $shippigCharge['title'],
                    'amount' => ($shippigCharge['type'] === 'f') ? $shippigCharge['amount'] : ($this->price * ($shippigCharge['amount'] / 100)),
                    'description' => $shippigCharge['description'],
                ];
            }
        };
        return false;

    }
}

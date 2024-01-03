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

namespace App\Blueprint\Support\Transaction;


use App\Blueprint\Interfaces\Transaction\PayableItemInterface;
use App\Eloquents\ProductAbstract;

/**
 * Class PayableItem
 * @package App\Blueprint\Support\Transaction
 */
class PayableItem implements PayableItemInterface
{
    public $model;

    public $price;

    public $tax;

    public $discount;

    public $shipping;

    public $name;

    public $description;

    public $total;

    public $quantity = 1;

    public $massAssignable = [
        'price', 'discount', 'name', 'quantity',
    ];

    /**
     * PayableItem constructor.
     *
     * @param $attributes
     * @param ProductAbstract|null $model
     */
    function __construct($attributes, ProductAbstract $model = null)
    {
        $this->model = $model;
        $this->setAttributes($attributes);
        $this->setTotal();
    }

    /**
     * Set attributes
     *
     * @param $attributes
     * @return $this
     */
    protected function setAttributes($attributes)
    {
        if ($this->model)
            $this->updateModelAttributes($attributes);
        else
            foreach ($this->massAssignable as $key)
                $this->{$key} = isset($attributes[$key]) ? $attributes[$key] : $this->{$key};

        return $this;
    }

    /**
     * Update item attributes from the model
     *
     * @param array $attributes
     * @return PayableItem $this
     */
    function updateModelAttributes($attributes = [])
    {
        foreach ($this->massAssignable as $key) {
            $this->{$key} = $this->model->{$key};
        }

        return $this;
    }

    /**
     * Get total price of item
     *
     * @return mixed
     */
    function setTotal()
    {
        $this->total = (double)$this->price + (double)$this->tax + (double)$this->shipping - (double)$this->discount;
    }

    /**
     * Get Price
     *
     * @return mixed
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * Get Name
     *
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Set Model
     *
     * @param mixed $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $model;
    }
}

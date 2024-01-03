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

namespace App\Blueprint\Services;

use App\Eloquents\Package;
use App\Eloquents\Product;
use Illuminate\Support\Collection;

/**
 * Class CartServices
 * @package App\Blueprint\Services
 */
class CartServices
{
    private $packageCart = 'packageCart';

    private $productCart = 'productCart';

    static $context = 'cart';

    /**
     * CartServices constructor.
     */
    function __construct()
    {
        $this->initSession();
    }

    /**
     * Initialize Session variables
     */
    function initSession()
    {
        if (!session()->has($this->packageCart)) session($this->packageCart, []);
        if (!session()->has($this->productCart)) session($this->productCart, []);
    }

    /**
     * @return string
     */
    public static function getContext()
    {
        return session('cartContext', self::$context);
    }

    /**
     * @param string $context
     * @return void
     */
    public static function setContext($context)
    {
        session(['cartContext' => $context]);
        self::$context = $context;
    }

    /**
     * Keep Order data.
     *
     * @param $params
     * @return array
     */
    function add($params)
    {
        $params = collect($params);
        $isPackage = $params->get('isPackage', false);
        $quantity = $params->get('quantity', 1);

        $packagetype = $params->get('packagetype',"buy");
        if ($isPackage) $this->clear('package');

        $target = $isPackage ? $this->packageCart : $this->productCart;
        /** @var Collection $data */
        $data = $this->getCart($isPackage);
        $key = encrypt($params->except('quantity')->all());

        if ($this->exists($isPackage, $key)) $quantity += $data[$key];

        $data->put($key, $quantity);

        

        session()->put($target, $data);

        return ['key' => $key, 'quantity' => $quantity];
    }

    /**
     * Delete entire or pool specific cart
     *
     * @param bool|string $type string type of cart
     * @return bool
     */
    function clear($type = false)
    {
        switch ($type) {
            case 'package':
                session()->forget($this->packageCart);
                break;
            case 'product':
                session()->forget($this->productCart);
                break;
            default:
                session()->forget([$this->productCart, $this->packageCart]);
                break;
        }

        return true;
    }

    /**
     * Get cart of a cart key
     *
     * @param bool $package
     * @param bool $key
     * @return array Cart data
     */
    function getCart($package = true, $key = false)
    {
        $collection = collect($package ? session($this->packageCart) : session($this->productCart));

        return ($key) ? $collection->get($key) : $collection;
    }

    /**
     * Check a cart item exists
     *
     * @param boolean $package package or not
     * @param string $key cart key
     * @param bool $productId
     * @return bool return existence status
     */
    function exists($package = true, $key, $productId = false)
    {
        $collection = $this->getCart($package);

        if (!$collection) return false;

        if ($productId) {
            $keys = $collection->keys();
            foreach ($keys as $key => $value) {
                $decrypted = decrypt($value);
                if ($decrypted['productId'] == $productId) return true;
            }
            return false;
        }

        return isset($collection[$key]) ? true : false;
    }

    /**
     * Delete an Item from cart
     *
     * @param boolean $package package or not
     * @param string $key cart key
     * @return void
     */
    function deleteItem($package = true, $key)
    {
        $target = $package ? $this->packageCart : $this->productCart;

        if ($this->exists($package, $key)) session()->forget($target . '.' . $key);
    }

    /**
     * Get cart product's total calculating discounts,shipping charge and tax
     *
     * @param bool $isPackage
     * @return Collection
     */
    function cartTotal($isPackage = true)
    {
        $data = [];
        $products = $this->resolveProducts($isPackage);
        $subTotal = $productTotal = 0;
        $eloquent = $isPackage ? Package::class : Product::class;
        $productContext = $isPackage ? 'package' : 'product';
        $context = static::getContext();
        /**
         * Here we starts calculating product based price modifications such as product
         * based discounts, product based shipping charge etc.
         */
        foreach ($products as $qty => $product) {
            /** @var Package $model */
            $model = $eloquent::find($product['productId']);

            if (!$model) continue;

            $price = $model->price;
            if(isset($product['packagetype']) && $product['packagetype'] == 'upgrade_price')
            {
                $price = $model->upgrade_price;
            }

            $data['products'][$model->id] = [
                'tax' => $productTax = defineFilter('productBasedTax', $model->getTax(), $productContext, [$model]),
                'fees' => $productFees = defineFilter('productBasedFee', $model->getFee(), $productContext, [$model]),
                'discount' => $productDiscount = defineFilter('productBasedDiscount', [], 'cart', ['product' => $model]),
                //'shipping' => $productShipping = defineFilter('productBasedShipping', $model->getShippingCharge(), 'cart', ['product' => $model]),
                'shipping' => $productShipping = defineFilter('productBasedShipping', [], 'cart', ['product' => $model]),
                'amount' => $totalAmount = $price + collect($productShipping)->sum('amount') + collect($productFees)->sum('amount') + collect($productTax)->sum('amount') - collect($productDiscount)->sum('amount'),
                'price' => $price,
                'pv' => $model->pv,
            ];
            // dd($data);
            $subTotal += $totalAmount;
            $productTotal += $model->price;
        }
        /**
         * Calculate general discounts, taxes and shipping charge which are not bound
         * to any products
         */
        $discount = defineFilter('cartDiscount', [], $context, ['subTotal' => $subTotal]);
        $shipping = defineFilter('cartShipping', [], $context, [$products]);
        $tax = defineFilter('cartTax', [], $context, ['subTotal' => $subTotal]);
        $fees = defineFilter('fee', [], $context, [$products]);
        //$registrationFees = defineFilter('fee', [], 'registration', [$products]);
        //$feeTotal = $data['feeTotal'] = collect($fees)->merge($registrationFees)->sum('amount');
        $feeTotal = $data['feeTotal'] = collect($fees)->sum('amount');
        $shippingTotal = $data['shippingTotal'] = collect($shipping)->sum('amount');
        $discountTotal = $data['discountTotal'] = collect($discount)->sum('amount');
        $taxTotal = $data['taxTotal'] = collect($tax)->sum('amount');
        $total = $subTotal + $taxTotal + $feeTotal + $shippingTotal;
        $total = ($discountTotal > $total) ? 0 : ($total - $discountTotal);
        $data['subTotal'] = $subTotal;
        $data['productTotal'] = $productTotal;
        $data['total'] = defineFilter('cartTotal', $total);
        $data['discount'] = $discount;
        $data['shipping'] = $shipping;
        $data['tax'] = $tax;
        //$data['fees'] = array_merge($fees, $registrationFees);
        $data['fees'] = $fees;

        return collect($data);
    }

    /**
     * Get cart entries of a cart key
     *
     * @param bool $package
     * @return array Cart data
     */
    function resolveProducts($package = false)
    {
        $collection = $this->getCart($package);
        $dispatch = [];

        foreach ($collection as $key => $qty) {
            $dispatch[] = decrypt($key);
        }

        return $dispatch;
    }

    /**
     * Get current carted package id
     *
     * @return array|bool
     */
    function getCartedPackage()
    {
        $collection = $this->getCart(true);

        if (!$collection) return false;

        $item = isset($collection->keys()[0]) ? $collection->keys()[0] : false;

        return $item ? decrypt($item)['productId'] : false;
    }
}

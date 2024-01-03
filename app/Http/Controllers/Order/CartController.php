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

namespace App\Http\Controllers\Order;

use App\Blueprint\Services\CartServices;
use App\Eloquents\Package;
use App\Eloquents\Product;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CartController
 * @package App\Http\Controllers\Order
 */
class CartController extends Controller
{
    /**
     * Add item to cart
     *
     * @param Request $request Request
     * @param CartServices $cart
     * @return JsonResponse
     */
    function add(Request $request, CartServices $cart)
    {
        $this->validate($request, [
            'productId' => 'required',
            'quantity' => 'required|numeric'
        ]);

        if ($result = $cart->add($request->only(['isPackage', 'productId', 'quantity','packagetype'])))
            return response()->json([
                'status' => true,
                'cart_key' => $result['key'],
                'quantity' => $result['quantity'],
                'item' => Package::find($request->input('productId'))
                    ->toArray(),
                'total' => prettyCurrency($cart->cartTotal()->get('total', 0))
            ]);
    }

    /**
     * get cart total
     *
     * @param CartServices $cart
     * @return JsonResponse
     */
    function getCartTotal(CartServices $cart)
    {
        if ($result = $result = $cart->cartTotal())
            return response()->json([
                'subtotal' => currency($result['subTotal']),
                'total' => currency($result['total']),
                'discount' => currency($result['discount']['amount'])
            ]);
    }

    /**
     * Check item exists in cart
     *
     * @param array $options item options
     * @param CartServices $cartServices
     * @return boolean return exists or not
     */
    function exists($options, CartServices $cartServices)
    {
        return $cartServices->exists(...$options);
    }

    /**
     * Order summary
     *
     * @param CartServices $cart
     * @param bool $isPackage
     * @param null $cartTotal
     * @return Factory|View
     */
    function cartSummary(CartServices $cart, $isPackage = true, $cartTotal = null)
    {
        $summary = $cartTotal ? $cartTotal : $cart->cartTotal();
        $eloquent = $isPackage ? Package::class : Product::class;
        $products = isset($summary['products']) ? collect($summary['products'])->mapWithKeys(function ($value, $key) use ($eloquent) {
            return [$key => array_merge($value, ['entity' => $eloquent::find($key)->toArray()])];
        })->all() : [];
        $data = [
            'products' => $products,
            'total' => $summary['total'],
            'subTotal' => $summary['subTotal'],
            'discounts' => $summary['discount'] ?: [],
            'shipping' => $summary['shipping'] ?: [],
            'taxes' => $summary['tax'] ?: [],
            'fees' => $summary['fees'] ?: []
        ];

        $view = ($cartTotal ? count($cartTotal['products']) : $cart->getCart()->count()) ? 'Auth.Partials.orderSummary' : 'Auth.Partials.orderSummaryWithoutItem';

        return view($view, $data);
    }

    function payment(CartServices $cart,$isPackage = true,$cartTotal = null)
    {
        $summary = $cartTotal ? $cartTotal : $cart->cartTotal();
        $eloquent = $isPackage ? Package::class : Product::class;
        // var_dump($eloquent->slug);exit;
        $products = isset($summary['products']) ? collect($summary['products'])->mapWithKeys(function ($value, $key) use ($eloquent) {
            return [$key => array_merge($value, ['entity' => $eloquent::find($key)->toArray()])];
        })->all() : [];

        $data = [
            'products' => $products,
            'total' => $summary['total'],
            'subTotal' => $summary['subTotal'],
            'discounts' => $summary['discount'] ?: [],
            'shipping' => $summary['shipping'] ?: [],
            'taxes' => $summary['tax'] ?: [],
            'fees' => $summary['fees'] ?: [],
            'monthly'=>(count($products) > 0 && $products[array_keys($products)[0]]['entity']['slug'] == 'ib')?true:false
        ];


        return view('Auth.Partials.paymentsummary', $data);   
    }
}

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

use App\Blueprint\Facades\CartServer;
use App\Eloquents\Order;
use App\Eloquents\OrderProduct;
use App\Eloquents\OrderTotal;
use App\Eloquents\Transaction;
use App\Eloquents\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

/**
 * Class OrderServices
 * @package App\Blueprint\Services
 */
class OrderServices
{
    /**
     * Keep Order data in session
     *
     * @param bool $package
     * @param \Illuminate\Http\Request $request
     * @return mixed
     * @internal param $array $ order data
     */
    function keepOrder($package = false, \Illuminate\Http\request $request)
    {
        $dispatch = [];
        //$dispatch['orderType'] = $type;
        $dispatch['orderType'] = 'package';
        $dispatch['ip'] = $request->ip();
        $dispatch['products'] = CartServer::resolveProducts($package);

        $request->merge($dispatch);

        return session(['orderData' => $request->all()]);
    }

    /**
     * Get Order data
     *
     * @param bool $key
     * @return array Order data
     */
    function getOrderData($key = false)
    {
        $data = session('orderData');

        return $key ? $data->get($key) : $data;
    }

    /**
     * @return mixed
     */
    function clearSession()
    {
        return session()->forget('orderData');
    }

    /**
     * Add an order
     *
     * @param integer $status order status
     * @param User $user
     * @param Transaction $transaction
     * @param bool $isPackage
     * @param $cartTotal
     * @return Order|\Illuminate\Database\Eloquent\Model
     * @internal param $transactionId
     */
    function addOrder($status, User $user, Transaction $transaction, $isPackage = true, $cartTotal = null)
    {
        $totalTypes = ['discount', 'tax', 'fees', 'shipping'];
        /** @var Collection $cart */
        $cart = $cartTotal ? collect($cartTotal) : CartServer::cartTotal();
        $productData = $cart->get('products', []);
        $orderData = [
            'status' => $status,
            'user_id' => $user->id,
            'ip' => Request::ip(),
            'user_agent' => Request::server('HTTP_USER_AGENT'),
            'transaction_id' => $transaction->id,
            'subtotal' => $cart->get('subTotal'),
            'total' => $cart->get('total'),
            'isPackage' => $isPackage,
        ];
        $order = Order::create($orderData);
        $products = [];
        $productTotals = [];
        /**
         * Extracting product details along with product based
         * totals like discounts, fees, tax etc.
         */
        foreach ($productData as $key => $value) {
            $products[] = new OrderProduct([
                'product_id' => $key,
                'subtotal' => $value['price'],
                'pv' => 0,//$value['pv'],
                'total' => $value['amount'],
            ]);
            $productTotals[$key] = collect($value)->only($totalTypes);
        }
        //Add product based total via relation
        foreach ($order->products($products) as $model) {
            /** @var OrderProduct $model */
            foreach ($productTotals[$model->product_id] as $type => $total) {
                if (!$total) continue;

                $dispatch = is_array($total) ? $total : [$total];
                $model->totals($dispatch, $type);
            }
        };
        //Add general totals via relation
        $cart->only($totalTypes)->each(function ($total, $type) use ($order) {
            if (!$total) return;
            $dispatch = is_array($total) ? $total : [$total];
            $order->totals($dispatch, $type);
        });

        return $order;
    }

    /**
     * get each products details in an order
     *
     * @param $id
     * @return Order
     */
    function getOrderInfo($id)
    {
        return Order::with('products', 'totals')->find($id);
    }

    /**
     * get each product order details
     *
     * @param $product_id
     * @param $options
     * @return mixed
     */
    function getOrderDetails($product_id, $options)
    {
        $type = (isset($options['type'])) ? $options['type'] : null;

        return OrderProduct::where('product_id', $product_id)->when($type, function ($query) use ($type, $options) {
            /** @var \Illuminate\Database\Query\Builder $query */

            switch ($type) {
                case 'today':
                    $query->where('created_at', '>=', Carbon::today());
                    break;
                case 'month':
                    $query->where('created_at', '>=', Carbon::now()->startOfMonth());
                    break;
                case 'year':
                    $query->whereYear('created_at', Carbon::now()->year);
                    break;
                case 'between':
                    $query->whereBetween('created_at', [$options['start']->format('Y-m-d') . " 00:00:00", $options['end']->format('Y-m-d') . " 23:59:59"]);
                    break;
            }
        })->get();
    }

    /**
     * @param Collection $options
     * @return Order|\Illuminate\Database\Eloquent\Builder
     */
    function getOrders(Collection $options)
    {
        $defaults = collect([
            'fromDate' => (new Order)->min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'sortBy' => 'created_at',
            'orderBy' => 'ASC',
            'status' => true
        ]);
        $options = $defaults->merge($options);

        return Order::with(['products.package', 'totals', 'transaction'])
            ->when($orderType = $options->get('orderType'), function ($query) use ($orderType) {
                if ($orderType == 'package') {
                    /** @var Builder $query */
                    $query->whereHas('products', function ($query) {
                        /** @var Builder $query */
                        $query->where('is_package', true);
                    });
                } else if ($orderType == 'product')
                    /** @var Builder $query */
                    $query->whereHas('products', function ($query) {
                        /** @var Builder $query */
                        $query->where('is_package', false);
                    });
            })
            ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })
            ->when($user = $options->get('user'), function ($query) use ($user) {
                /** @var Builder $query */
                !is_int($user) ? $query->where('user_id', $user) : $query->where('user_id', $user);
            })
            ->when($orderId = $options->get('orderId'), function ($query) use ($orderId) {
                /** @var Builder $query */
                $query->where('id', $orderId);
            })
            ->when($gateway = $options->get('gateway'), function ($query) use ($gateway) {
                /** @var Builder $query */
                $query->whereHas('transaction', function ($query) use ($gateway) {
                    /** @var Builder $query */
                    $query->where('gateway', $gateway);
                });
            })
            ->orderBy($options->get('sortBy'), $options->get('orderBy'));
    }

    /**
     * @param Builder $query
     * @param string $groupBy
     * @param string $totalColumn
     * @param string $totalAlias
     * @param string $countAlias
     * @return Builder
     */
    function groupBy(Builder &$query, $groupBy = 'month', $totalColumn = 'total', $totalAlias = 'totalAmount', $countAlias = 'totalNos')
    {
        switch ($groupBy) {
            case 'month':
            case 'year':
            case 'day':
            case 'hour':
                /** @var Builder $query */
                $query->groupBy(DB::raw("$groupBy(created_at)"))
                    ->select(DB::raw("*, MONTH(created_at) month,YEAR(created_at) year, DAY(created_at) day, HOUR(created_at) hour, SUM($totalColumn) $totalAlias, COUNT(1) $countAlias"));
                break;
            default:
                /** @var Builder $query */
                $query->groupBy($groupBy);
                break;
        }

        return $query;
    }

    /**
     * @param Collection $options
     * @return Order|\Illuminate\Database\Eloquent\Builder
     */
    function getOrderTotals(Collection $options)
    {
        $defaults = collect([
            'fromDate' => (new OrderTotal)->min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'sortBy' => 'created_at',
            'orderBy' => 'ASC',
            'status' => true
        ]);
        $options = $defaults->merge($options);

        return OrderTotal::with('order')
            ->when($orderType = $options->get('orderType'), function ($query) use ($orderType) {
                if ($orderType == 'package')
                    /** @var Builder $query */
                    $query->whereHas('order.products', function ($query) {
                        /** @var Builder $query */
                        $query->where('is_package', true);
                    });
            })
            ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'), 'amount', 'total');
            })
            ->orderBy($options->get('sortBy'), $options->get('orderBy'));
    }
}

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

use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Support\Transaction\Invoice;
use App\Blueprint\Traits\SetPaymentAttributes;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class OrderController
 * @package App\Http\Controllers\Order
 */
class OrderController extends Controller
{
    use SetPaymentAttributes;

    protected $callback;

    protected $gateway;

    /**
     * Order Invoice
     *
     * @param bool $orderId
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return Factory|View
     */
    function invoice($orderId = false, Request $request, PaymentServices $paymentServices)
    {
        $payable = $paymentServices->preparePayableFromOrder($orderId);
        $invoice = app()->makeWith(Invoice::class, ['payable' => $payable, 'metaData' => $request->input('invoiceMeta', []), 'orderId' => $orderId]);
        return $invoice->preview();
    }
}
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

use App\Blueprint\Support\Mail\Mailable;
use App\Eloquents\Order;
use App\Mail\InvoiceMail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

/**
 * Class Invoice
 * @package App\Blueprint\Support\Transaction
 */
class Invoice
{
    protected $recipients;

    protected $items;

    protected $data;

    protected $mailable;

    protected $payable;

    protected $invoiceName;

    protected $invoiceExcerpt;

    protected $order;

    /**
     * Invoice constructor.
     *
     * @param array $metaData
     * @param Payable $payable
     * @param array $recipients
     * @param Mailable|null $mailable
     * @param bool $orderId
     */
    function __construct($metaData = [], Payable $payable, $recipients = [], Mailable $mailable = null, $orderId = false)
    {
        $this->payable = $payable;
        $this->setMetaData($metaData);
        $this->setOrder($orderId);
        $this->setData();
        $this->mailable = $mailable ?: app()->make(InvoiceMail::class);
    }

    /**
     * Set invoice meta data
     *
     * @param $metaData
     */
    protected function setMetaData($metaData)
    {
        $this->invoiceName = isset($metaData['name']) ? $metaData['name'] : 'Invoice';
        $this->invoiceExcerpt = isset($metaData['excerpt']) ? $metaData['excerpt'] : 'Invoice description';
    }

    /**
     * @param $orderId
     */
    protected function setOrder($orderId)
    {
        if (!$orderId) return;

        $this->order = Order::find($orderId);
    }

    /**
     * @param Invoice|array $data
     *
     * @return mixed
     */
    public function setData($data = [])
    {
        return tap($this, function ($invoice) use ($data) {
            if ($data)
                $invoice->data = $data;
            else {
                $total = $this->payable->total;
                $grandTotal = $this->order ? $this->order->total : $total;
                $invoice->data = [
                    'items' => $this->payable->getItems(),
                    'hasShipping' => $this->payable->hasShipping(),
                    'payer' => $this->payable->getPayer(),
                    'payee' => $this->payable->getPayee(),
                    'total' => $total,
                    'invoiceName' => $this->invoiceName,
                    'invoiceExcerpt' => $this->invoiceExcerpt,
                    'grandTotal' => $grandTotal,
                    'companyInfo' => 'My Company Address goes here',
                    'styles' => [
                        asset('css/misc/invoice/standard.css'),
                    ],
                    'orderTotal' => $this->order ? $this->order->totals : [],
                ];

            }
        });
    }

    /**
     * Invoice preview
     *
     * @return string
     * @throws \Throwable
     */
    function preview()
    {
        return view('Misc.Invoice.invoiceStandard', $this->data)->render();
    }

    /**
     * Send invoice mail
     *
     * @param Collection|array|null $recipients
     * @return Invoice $this
     */
    function send($recipients = null)
    {
        return $this;
        $recipients = $recipients ?: $this->recipients;
        $this->mailable->setData();
        Mail::to($recipients)->send($this->mailable);

        return $this;
    }

    /**
     * Set recipients
     *
     * @param null $recipients
     * @return $this
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;

        return $this;
    }
}

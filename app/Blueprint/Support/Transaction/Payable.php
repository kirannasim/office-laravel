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

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleInterface;
use App\Blueprint\Interfaces\Transaction\PayableInterface;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Class Payable
 * @package App\Blueprint\Support\Transaction
 */
class Payable implements PayableInterface
{
    public $payee;

    public $items;

    public $invoiceName;

    public $total;

    public $actualAmount;

    public $callback;

    public $context;

    public $remarks;

    public $invoiceData;

    public $fillable = [
        'payer', 'payee', 'items', 'invoiceName',
        'context', 'gateway', 'actualAmount',
        'total', 'fromModule', 'toModule', 'charges'
    ];

    protected $payer;

    protected $gateway;

    protected $fromModule;

    protected $toModule;

    protected $operation;

    protected $charges;

    public $status;

    /**
     * Payable constructor.
     *
     * @param $attributes
     */
    function __construct($attributes = [])
    {
        $this->setAttributes($attributes);

        if ($this->items) $this->setTotal();
    }

    /**
     * Set attributes
     *
     * @param $attributes
     * @return $this
     */
    function setAttributes($attributes)
    {
        foreach ($attributes as $property => $value) {
            if (in_array($property, $this->fillable)) {
                switch ($property) {
                    case 'items':
                        $this->setItems($value);
                        break;
                    case 'gateway':
                        $this->{$property} = is_int($value) ? getModule($value) : $value;
                        break;
                    case 'payee':
                    case 'payer':
                        $this->{$property} = is_int($value) ? User::find($value) : $value;
                        break;
                    default:
                        $this->{$property} = $value;
                        break;
                }
            }
        }

        return $this;
    }

    /**
     * Get invoice attributes to build invoice for the payable
     *
     * @return array
     */
    function hasInvoice()
    {
        return [
            'name' => $this->invoiceName,
            'items' => $this->getItems(),
            'recipients' => [$this->getPayer(), $this->getPayee()],
        ];
    }

    /**
     * Get Items
     * @return mixed
     */
    function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items
     *
     * @param mixed $items
     * @return $this
     */
    public function setItems($items)
    {
        $collection = collect([]);
        //Converts non array types to array
        $items = is_array($items) ? $items : ($items instanceof Collection ? $items->all() : []);
        //Filters PayableItem or create from raw data
        foreach ($items as $item) {
            if ($item instanceof PayableItem) {
                $collection->push($item);
            } elseif (is_array($item) || $item instanceof Arrayable) {
                $collection->push(new PayableItem($item));
            }
        }
        /** @var Collection $collection */
        $this->items = $collection;

        return $this;
    }

    /**
     * Get Payer
     *
     * @return mixed
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * @param mixed $payer
     *
     * @return Payable
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payee info
     *
     * @return mixed
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * @param mixed $payee
     *
     * @return Payable
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * Get total amount
     *
     * @return float|integer
     */
    function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total from the items's Total
     *
     * @param null $amount
     * @return $this
     */
    public function setTotal($amount = null)
    {
        $this->total = ($amount !== null) ? $amount : $this->items->sum(function ($item) {
            /** @var PayableItem $item */
            return $item->total * $item->quantity;
        });

        return $this;
    }

    /**
     * @return $this
     */
    function nullTotal()
    {
        $this->total = 0;
        return $this;
    }

    /**
     * Any pre-transaction tasks can be written here.
     *
     * @return mixed
     */
    function preTransaction()
    {
        return null;
    }

    /**
     * Any post-transaction tasks can be written here.
     *
     * @return mixed
     */
    function postTransaction()
    {
        // TODO: Implement postTransaction() method.
    }

    /**
     * Context of the payment such as registration, account upgrade etc.
     *
     * @return mixed
     */
    function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return Payable
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Return via which gateway/medium the transaction is going tobe fulfilled.
     *
     * @return mixed
     */
    function gateway()
    {
        return $this->gateway;
    }

    /**
     * Does the payable have items to be shipped
     *
     * @return boolean
     */
    function hasShipping()
    {
        return false;
    }

    /**
     * Return meta data for building invoice
     *
     * @param array $data
     * @return Payable $this
     */
    function setInvoiceData($data = [])
    {
        $this->invoiceData = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActualAmount()
    {
        return $this->actualAmount;
    }

    /**
     * @param mixed $actualAmount
     * @return Payable
     */
    public function setActualAmount($actualAmount)
    {
        $this->actualAmount = $actualAmount;

        return $this;
    }

    /**
     * @return ModuleBasicAbstract|PaymentModuleInterface|mixed
     */
    public function getFromModule()
    {
        return $this->fromModule;
    }

    /**
     * @param mixed $fromModule
     * @return Payable
     */
    public function setFromModule($fromModule)
    {
        $this->fromModule = $fromModule;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param mixed $remarks
     * @return Payable
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToModule()
    {
        return $this->toModule;
    }

    /**
     * @param mixed $toModule
     * @return Payable
     */
    public function setToModule($toModule)
    {
        $this->toModule = $toModule;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @param mixed $gateway
     * @return Payable
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param mixed $operation
     * @return Payable|bool
     */
    public function setOperation($operation)
    {
        if (!$operation = (new TransactionOperation)->where('slug', $operation)->first())
            return $this;

        $this->operation = $operation->id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * @param mixed $charges
     * @return Payable
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get Payer
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     * @return Payable
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}

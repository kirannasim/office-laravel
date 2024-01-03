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

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Interfaces\Transaction\PayableInterface;
use App\Blueprint\Support\Transaction\Invoice;
use App\Blueprint\Support\Transaction\Payable;
use App\Eloquents\OrderTotal;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionCharge;
use App\Eloquents\TransactionDetail;
use App\Eloquents\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class TransactionServices
 * @package App\Blueprint\Services
 */
class TransactionServices
{
    public $invoice;

    public $transaction;

    protected $payable;

    /**
     * Starts a transaction here
     *
     * @param PayableInterface|Payable $payable
     * @return TransactionServices|string
     */
    function processTransaction(Payable $payable)
    {
        //Bind the payable to the class so that we can
        //use it later where we need the payable object.
        $this->setPayable($payable);
        //Any pre transaction tasks such as events/mail
        $payable->preTransaction();
        //Prepares attributes of the transaction
        $attributes = [
            'payee' => $payable->getPayee() ? $payable->getPayee()->id : 'self',
            'payer' => $payable->getPayer() ? $payable->getPayer()->id : '',
            'amount' => $payable->total,
            'actual_amount' => $payable->actualAmount,
            'context' => $payable->getContext(),
            'gateway' => $payable->gateway()->model->id ?: '',
            'ip' => request()->ip(),
            'status' => (isset($payable->status) && $payable->status == 0) ? 0 : 1,
        ];
        $transaction = new Transaction($attributes);
        $transaction->save();
        $this->transaction = $transaction;
        //Any post transaction tasks such as events/mail
        $payable->postTransaction();
        //If the transaction needs invoice we attach the invoice to this and return it.
        if ($payable->hasInvoice()) return $this->prepareInvoice();

        return $this;
    }

    /**
     * Prepare Invoice for the transaction
     *
     * @param PayableInterface|Payable $payable
     * @return TransactionServices $this
     */
    function prepareInvoice(Payable $payable = null)
    {
        /** @var Payable $payable */
        $payable = $payable ?: $this->payable;
        $this->invoice = app()->makeWith(Invoice::class, ['payable' => $payable, 'metaData' => $payable->invoiceData]);

        return $this;
    }

    /**
     * @return TransactionServices|TransactionDetail
     */
    function setOperation()
    {
        if (!$this->getTransaction() || (!$payable = $this->getPayable()) || !$payable->getOperation())
            return $this;

        $this->getTransaction()->operation()->create([
            'remarks' => $payable->getRemarks(),
            'from_module' => $payable->getFromModule(),
            'to_module' => $payable->getToModule(),
            'operation_id' => $payable->getOperation()
        ]);

        return $this;
    }

    /**
     * @return Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param mixed $transaction
     * @return TransactionServices
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @return Payable
     */
    public function getPayable()
    {
        return $this->payable;
    }

    /**
     * Set Payable
     *
     * @param mixed $payable
     * @return TransactionServices
     */
    public function setPayable(Payable $payable)
    {
        $this->payable = $payable;

        return $this;
    }

    /**
     * @return $this
     */
    function setCharges()
    {
        if (!$this->getTransaction() || (!$payable = $this->getPayable()))
            return $this;

        if ($transactionCharges = $this->getPayable()->getCharges())
            foreach ($transactionCharges as $charge) {
                $this->getTransaction()->charges()->create([
                    'amount' => $charge['amount'],
                    'module_id' => $charge['moduleId'],
                    'is_credit' => $charge['isCredit'],
                ]);
            }

        return $this;
    }

    /**
     * @param Collection $args
     * @param Transaction|null $model
     * @return Builder|mixed
     */
    function getTransactions(Collection $args, $model = null)
    {
        //Default options
        $defaults = collect([
            'fromDate' => (new Transaction)->min('created_at'),
            'toDate' => date('Y-m-d H:i:s'),
            'sortBy' => 'created_at',
            'orderBy' => 'desc',
            /* 'status' => true*/
        ]);
        $options = $defaults->merge($args);
        /** @var Model $model */
        $model = $model ?: Transaction::class;
        $table = (new $model)->getTable();
        $columns = Schema::getColumnListing((new Transaction())->getTable());
        // dd($options);
        return $model::with('operation.operationDetails', 'payerUser', 'order.totals')
            /*            ->addSelect($columns)*/
            ->has('payerUser')
            ->has('payeeUser')
            ->whereHas('operation', function ($query) use ($options) {
                /** @var Builder $query */
                $query->when($module = $options->get('wallet'), function ($query) use ($module, $options) {
                    /** @var Builder $query */
                    list($fromModule, $toModule, $constrain) = array_values($this->parseValue($module));

                    if ($fromModule && $toModule)
                        $query->where(function ($query) use ($toModule, $constrain, $fromModule) {
                            /** @var Builder $query */
                            $query->where('from_module', $fromModule)->{$constrain}('to_module', $toModule);
                        });
                    else {
                        if ($fromModule) $query->where('from_module', $fromModule);
                        if ($toModule) $query->where('to_module', $toModule);
                    }
                })->when($options->get('operation'), function ($query) use ($options) {
                    /** @var Builder $query */
                    if (is_array($operation = $options->get('operation'))) {
                        list($operationId, $constrain) = $operation;
                        $query->where('operation_id', $constrain, $operationId);
                    } else
                        $query->where('operation_id', $options->get('operation'));
                });
            })
            ->when($transactionId = $options->get('transactionId'), function ($query) use ($transactionId, $options) {
                /** @var Builder $query */
                $query->where('id', $transactionId);
            })
            ->when($options->get('user'), function ($query) use ($options) {
                /** @var Builder $query */
                $query->whereNested(function ($query) use ($options) {
                    /** @var Builder $query */
                    if (!is_array($user = $options->get('user')))
                        $query->where('payee', $user)
                            ->orWhere('payer', $user);
                    else {
                        $user = !isMultiDimensionalArray($user) ? [$user] : $user;

                        foreach ($user as $each) {
                            list($userId, $type, $operator) = array_values($this->parseUser($each));
                            $query->where($type, $operator, $userId);
                        }
                    }
                });
            })
            ->when($options->get('type'), function ($query) use ($table, $options) {
                /** @var Builder $query */
                if ($options->get('type') == 'income')
                    $query->where('payee', $options->get('user'))
                        ->whereRaw("`$table`.payer <> {$options->get('user')}");

                if ($options->get('type') == 'expense') $query->where('payer', $options->get('user'));
            })
            ->when($options->get('status'), function ($query) use ($options) {
                /** @var Builder $query */
                $query->where('status', $options->get('status'));

            })
            ->whereBetween((new Transaction)->getTable() . '.created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })
            ->orderBy($options->get('sortBy'), $options->get('orderBy'));
    }

    /**
     * @param $value array|string
     * @return array|string
     */
    function parseValue($value)
    {
        if (is_array($value))
            switch ($count = count($value)) {
                case ($count > 2):
                    list($from, $to, $constrain) = $value;
                    return compact('from', 'to', 'constrain');
                    break;
                case (2):
                    list($from, $to) = $value;
                    $constrain = 'orWhere';
                    return compact('from', 'to', 'constrain');
                    break;
                default:
                    return [$value[0], $value[0], 'orWhere'];
                    break;
            }

        return $this->parseValue(explode('.', $value));
    }

    /**
     * @param $value array|string
     * @return array|string
     */
    function parseUser($value)
    {
        if (is_array($value))
            switch ($count = count($value)) {
                case ($count > 2):
                    list($userId, $type, $operator) = $value;
                    return compact('userId', 'type', 'operator');
                    break;
                case (2):
                    list($userId, $type) = $value;
                    $operator = '=';
                    return compact('userId', 'type', 'operator');
                    break;
                default:
                    return [$value[0], $value[0], '='];
                    break;
            }

        return $this->parseUser(explode('.', $value));
    }

    /**
     * @param Builder $query
     * @param string $groupBy
     * @return Builder
     */
    public function groupBy(Builder $query, $groupBy = 'month')
    {
        switch ($groupBy) {
            case 'month':
            case 'year':
            case 'day':
            case 'hour':
                /** @var Builder $query */
                $query->groupBy(DB::raw("$groupBy(created_at)"))
                    ->selectRaw('*, MONTH(created_at) month,YEAR(created_at) year, DAY(created_at) day, SUM(amount) total');
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
     * @return TransactionCharge|Builder
     */
    function transactionCharges(Collection $options = null)
    {
        //Default options
        $defaults = collect([
            'fromDate' => (new Transaction)->has('charges')->min('created_at'),
            'toDate' => date('Y-m-d H:i:s'),
            'sortBy' => 'created_at',
            'orderBy' => 'asc',
        ]);
        $options = $defaults->merge($options);
        $chargesTable = (new TransactionCharge)->getQuery()->from;
        $txnTable = (new Transaction)->getTable();

        return TransactionCharge::with('transaction')
            ->when($groupBy = $options->get('groupBy'), function ($query) use ($chargesTable, $groupBy, $options) {
                /** @var Builder $query */
                $createdAt = $query->getQuery()->getGrammar()->wrap('created_at');
                $amount = $query->getQuery()->getGrammar()->wrap('amount');
                $query->selectRaw("*, MONTH($createdAt) month, YEAR($createdAt) year, DAY($createdAt) day, HOUR($createdAt) hour, sum($chargesTable.$amount) totalCharge")->groupBy($groupBy);
            })
            ->join($tc = $txnTable, $chargesTable . '.transaction_id', '=', $tc . '.id')
            ->orderBy($options->get('sortBy'), $options->get('orderBy'))
            ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')]);
    }

    /**
     * @param Transaction $model
     * @param User $user
     * @param ModuleBasicAbstract|WalletModuleInterface $module
     * @return Transaction
     */
    public function bindExtraAttributes(Transaction $model, $module = null, User $user = null): Transaction
    {
        $user = $user ?: loggedUser();
        $orderTotal = isset($model->order->totals) ? collect($model->order->totals)->sum(function ($total) {
            /** @var OrderTotal $total */
            return $total->module()->operationType() == 'sub' ? (-$total->amount) : $total->amount;
        }) : false;

        return $model->setAttribute('isCredit', $model->isCreditFor($user, $module))
            ->setAttribute('totalCharges', $model->charges ? $model->charges()->sum('amount') : 0)
            ->setAttribute('cartTotalAmount', $orderTotal);
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function deleteTransaction($id)
    {
        return Transaction::find($id)->delete();
    }
}

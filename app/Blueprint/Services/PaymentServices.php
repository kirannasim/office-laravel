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


use App\Blueprint\Facades\ModuleServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleInterface;
use App\Blueprint\Support\Transaction\Callback;
use App\Blueprint\Support\Transaction\Payable;
use App\Eloquents\Order;
use App\Eloquents\OrderProduct;
use App\Eloquents\Package;
use App\Eloquents\User;
use Illuminate\Support\Collection;

/**
 * Class PaymentServices
 * @package App\Blueprint\Services
 */
class PaymentServices
{
    static $errors;

    protected $sessionKey = 'blueprintPaymentData';

    protected $sessionData;

    protected $callback;

    protected $gateway;

    protected $payable;

    protected $response;

    protected $multiPayment = false;

    protected $authorized = false;

    protected $isPayout = false;

    protected $status = false;

    /**
     * PaymentController constructor.
     *
     * @param PaymentModuleInterface|ModuleBasicAbstract $gateway
     * @param Callback $callback
     */
    function __construct($gateway = null, Callback $callback = null)
    {
        $this->setGateway($gateway)
            ->setCallback($callback);
    }

    /**
     * @param $message
     * @param int $status
     * @return bool
     */
    public static function setError($message, $status = 422)
    {
        $errors = static::$errors;
        $errors[] = ['status' => $status, 'message' => $message];

        static::setErrors($errors);

        return true;
    }

    /**
     * @return Collection
     */
    public static function getErrors()
    {
        return collect(static::$errors)->sortBy(function ($value) {
            $errorOrder = [422, 500, 403];
            return array_search($value['status'], $errorOrder);
        });
    }

    /**
     * @param mixed $errors
     */
    public static function setErrors($errors)
    {
        static::$errors = $errors;
    }

    /**
     * @return Collection
     */
    public function getSessionData()
    {
        return collect($this->sessionData ?: session($this->sessionKey));
    }

    /**
     * @param mixed $sessionData
     */
    public function setSessionData($sessionData)
    {
        $this->sessionData = session($this->sessionKey, $sessionData);
    }

    /**
     * Process Payment
     *
     * @return bool|\Illuminate\Http\JsonResponse
     */
    function processPayment()
    {
        if (!$this->isAuthorized() || !$this->getGateway() || !$this->getPayable())
            return false;
        
        $method = $this->isPayout ? 'processPayout' : 'processPayment';
        // Checking multi-transaction possibilities
        if (is_array($this->getPayable())) {
            $this->setMultiPayment(true);
            $response = [];
            // Looping through each payable and processes its transaction
            foreach ($this->getPayable() as $payable)
                $response[] = app()->call([$this->getGateway(), $method], ['payable' => $payable]);
        } else
            $response = app()->call([$this->getGateway(), $method], ['payable' => $this->getPayable()]);

        return $this->setResponse($response)->finish();
    }

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->authorized;
    }

    /**
     * @param bool $authorized
     * @return PaymentServices
     */
    public function setAuthorized($authorized)
    {
        $this->authorized = $authorized;

        return $this;
    }

    /**
     * @return PaymentModuleAbstract
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * Set payment gateway
     *
     * @param PaymentModuleInterface|string|integer $gateway
     * @return $this
     */
    public function setGateway($gateway)
    {
        switch (gettype($gateway)) {
            case 'object':
                $this->gateway = $gateway;
                break;
            default:
                $this->gateway = static::gatewayFromSlugOrId($gateway);
                break;
        }

        return $this;
    }

    /**
     * @param null $from
     * @return Payable|array|null
     */
    public function getPayable($from = null)
    {
        switch ($from) {
            case 'cart':
                return app()->call([$this, 'preparePayableFromCart']);
                break;
            case 'order':
                return app()->call([$this, 'preparePayableFromOrder']);
                break;
            default:
                return $this->payable;
        }
    }

    /**
     * @param Payable|array $payable
     * @param array $attributes
     * @return PaymentServices
     */
    public function setPayable($payable = null, $attributes = [])
    {
        if (is_string($payable))
            switch ($payable) {
                case 'cart':
                    $this->payable = app()->call([$this, 'preparePayableFromCart'], $attributes);
                    break;
                case 'order':
                    $this->payable = app()->call([$this, 'preparePayableFromOrder'], $attributes);
                    break;
            }
        else
            $this->payable = $payable;

        return $this;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    function finish()
    {
        session()->forget('paymentData');

        return tap($this->handleResponse(), function () {
            $this->clean();
        });
    }

    /**
     * Handle response from payment module
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    function handleResponse()
    {
        $response = collect($this->getResponse());

        if ($this->isMultiPayment()) {
            $callback = [];

            foreach ($response as $each)
                $callback[] = app()->call([$this->getCallback(), $each['next']], ['response' => $each]);

            return defineFilter('paymentResponse', [
                    'result' => $callback,
                    'multiPayment' => true,
                    'gateway' => $gateway = $this->getGateway()]
            );
        }

        $nextAction = $response->get('next', 'failure');
        $gateway = $this->getGateway();

        return defineFilter('paymentResponse', collect([
            'result' => app()->call([$this->getCallback(), $nextAction], ['response' => $response]),
            'multiPayment' => false,
            'gateway' => $gateway,
            'status' => $response->get('status', 200)
        ]));
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     * @return PaymentServices
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiPayment()
    {
        return $this->multiPayment;
    }

    /**
     * @param bool $multiPayment
     * @return PaymentServices
     */
    public function setMultiPayment($multiPayment)
    {
        $this->multiPayment = $multiPayment;

        return $this;
    }

    /**
     * @return Callback|null
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Register payment gateway callbacks
     *
     * @param Callback $callback
     * @return PaymentServices
     */
    function setCallback(Callback $callback = null)
    {
        $sessionData = $this->getSessionData();
        $callback = $callback ?: $sessionData->get('callback');
        $sessionData['callBack'] = $this->callback = $callback;

        session($this->sessionKey, $sessionData);

        return $this;
    }

    /**
     * clean and lock payment service
     */
    function clean()
    {
        $this->gateway = null;
        $this->callback = false;
        $this->setMultiPayment(false)
            ->setPayable(null)
            ->setResponse(null)
            ->setAuthorized(false);
        static::setErrors(null);
        static::setSessionData(null);

        return $this;
    }

    /**
     * Payment gateway CallBack
     *
     * @return mixed
     */
    function callBack()
    {
        return $this->setResponse(app()->makeWith($this->getCallback(), ['gateway' => $this->getGateway()]))
            ->handleResponse();
    }

    /**
     * Prepare payable for registration payment
     *
     * @param PaymentModuleInterface $gateway
     * @param CartServices $cartServices
     * @param User $payee
     * @param User $payer
     * @param string $context
     * @return mixed
     */
    function preparePayableFromCart(CartServices $cartServices, $gateway = null, User $payee = null, User $payer = null, $context = '')
    {
        $gateway = $gateway ?: $this->getGateway();
        $cart = $cartServices->cartTotal();
        $attributes = [
            'payee' => $payee ?: ($this->getPayable() ? $this->getPayable()->getPayee() : ''),
            'payer' => $payer ?: ($this->getPayable() ? $this->getPayable()->getPayer() : ''),
            'context' => $context ?: ($this->getPayable() ? $this->getPayable()->getContext() : ''),
            'gateway' => $gateway,
            'actualAmount' => $cart->get('productTotal'),
            'total' => $cart->get('total')
        ];
        $payableClass = $gateway->getPayable() ?: Payable::class;

        return new $payableClass($attributes);
    }

    /**
     * Prepare Order from Order
     *
     * @param $orderId
     * @return Payable
     */
    function preparePayableFromOrder($orderId)
    {
        $order = Order::find($orderId);
        $transaction = $order->transaction;
        $gateway = PaymentServices::gatewayFromSlugOrId($transaction->gateway);
        $attributes = [
            'payee' => $transaction->payee,
            'payer' => $transaction->payer,
            'context' => $transaction->context,
            'gateway' => $transaction->gateway,
        ];
        $products = $order->products;
        $items = [];
        /** @var OrderProduct $product */
        foreach ($products as $product) {
            $model = Package::find($product->product_id);
            $items[] = [
                'name' => $model->name,
                'description' => $model->description,
                'price' => $model->price,
                'pv' => $model->pv,
                'discount' => $product->totals()->where('type', 'discount')->get()
                    ->sum('amount'),
            ];
        }
        $attributes['items'] = $items;

        /** @var Payable $payableClass */
        $payableClass = $gateway->getPayable() ?: Payable::class;

        return new $payableClass($attributes);
    }

    /**
     * get Gateway From Id
     *
     * @param $slugOrId
     * @return mixed
     */
    static function gatewayFromSlugOrId($slugOrId)
    {
        return $slugOrId ? ModuleServer::callModule($slugOrId) : false;
    }

    /**
     * @param $attributes
     * @return Payable|array
     */
    function preparePayable($attributes)
    {
        if (isNumericArray($attributes)) {
            $payableGroup = [];

            foreach ($attributes as $group)
                $payableGroup[] = $this->preparePayable($group);

            return $payableGroup;
        }

        return (new Payable())
            ->setPayer($attributes['payer'])
            ->setPayee($attributes['payee'])
            ->setOperation($attributes['operation'])
            ->setContext($attributes['context'])
            ->setFromModule($attributes['fromModule'])
            ->setToModule($attributes['toModule'])
            ->setTotal((double)$attributes['total'])
            ->setActualAmount($attributes['actualAmount'])
            ->setRemarks($attributes['remarks'])
            ->setGateway($attributes['gateway'])
            ->setCharges($attributes['charges'])
            ->setStatus(in_array('status', $attributes) ? $attributes['status'] : true);
    }

    /**
     * @return float|int
     */
    function totalPayable()
    {
        return is_array($payable = $this->getPayable()) ? array_sum(array_map(function ($value) {
            /** @var Payable $value */
            return $value->getTotal();
        }, $payable)) : $payable->getTotal();
    }

    /**
     * @return bool
     */
    public function isPayout()
    {
        return $this->isPayout;
    }

    /**
     * @param bool $isPayout
     */
    public function setIsPayout($isPayout)
    {
        $this->isPayout = $isPayout;
    }
}

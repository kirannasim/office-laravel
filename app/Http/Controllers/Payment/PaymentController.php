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

namespace App\Http\Controllers\Payment;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\ConfigServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class PaymentController
 * @package App\Http\Controllers\Order
 */
class PaymentController extends Controller
{
    protected $payable;

    protected $gateway;

    protected $context = 'root';

    protected $callback;

    /**
     * @param Request $request
     * @param PaymentServices $paymentServices
     * @return mixed
     */
    function handle(Request $request, PaymentServices $paymentServices)
    {
        // Hook for some actions like validation which need to be run prior starting payment.

        if($request->input('context') == 'public_registration')
        {
            echo json_encode(array('success'=>true,'result'=>array('next'=>'pending','redirectUri'=>scopeRoute('register'))));
                return;
        }
        defineAction('prePaymentProcessAction', $request->input('context', $this->getContext()), $request);

        
        // Throw errors if any validation
        if (!$paymentServices->isAuthorized())
            PaymentServices::setError('Transaction not allowed !', 403);


        if (($errors = PaymentServices::getErrors()) && $errors->count() && ($error = collect($errors->first())))
            return response()->json(['message' => $error->get('message')], $error->get('status', 422));

        return DB::transaction(function () use ($request, $paymentServices) {
            if (!$response = $paymentServices->processPayment())
                return response()->json(['message' => 'Payment initialization failed'], 422);

            // Post payment action hook.
            defineAction('postPaymentProcessAction', $request->input('context', $this->getContext()), $response);
            // Payment response data filter hook for further response customization
            return response()->json(defineFilter('paymentFinalResponse', $response, $this->getContext()));
        });
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return PaymentController
     */
    public function setContext($context = null)
    {
        $this->context = $context ?: session('paymentContext');

        return $this;
    }

    /**
     * Payment gateway CallBack
     *
     * @param Request $request
     * @return mixed
     */
    function callBack(Request $request)
    {
        $response = app()->call([$this->gateway, 'callback']);

        return app()->call([$this->callback, $response['next']], ['data' => $response]);
    }

    /**
     * @param mixed $gateway
     * @return PaymentController
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * Show gateways
     *
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @param ConfigServices $configServices
     * @return Factory|View
     */
    public function getGateways(Request $request, ModuleServices $moduleServices, ConfigServices $configServices)
    {
        $data['gateways'] = array_values(array_filter($moduleServices->getPaymentPool('active'), function ($gateway) use ($configServices, $request) {
            /** @var ModuleBasicAbstract $gateway */
            return ($context = $request->input('context')) ? (in_array($gateway->registry['slug'], (array)json_decode($configServices->getConfigData('payment_gateway', $context))) ? true : false) : true;
        }));


        $data['paymentAmount'] = $request->input('paymentAmount');

        return view('Payment.gateways', $data);
    }

    public function getGatewayitem(Request $request,ModuleServices $moduleServices,ConfigServices $configServices)
    {
        $data['gateways'] = array_values(array_filter($moduleServices->getPaymentPool('active'), function ($gateway) use ($configServices, $request) {
            /** @var ModuleBasicAbstract $gateway */
            return ($context = $request->input('context')) ? (in_array($gateway->registry['slug'], (array)json_decode($configServices->getConfigData('payment_gateway', $context))) ? true : false) : true;
        }));

        $array = array();
        foreach ($data['gateways'] as $key => $gateway) {
            if($gateway->registry['slug'] == $request->input('gateway'))
            {
                return ['id'=>$gateway->moduleId];
            }
            
        }
    }
}
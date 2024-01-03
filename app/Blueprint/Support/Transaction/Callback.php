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

use Illuminate\Http\JsonResponse;

/**
 * Class Callback
 * @package App\Blueprint\Support\Transaction
 */
class Callback
{
    protected $gateway;

    /**
     * Callback constructor.
     *
     * @param null $gateway
     */
    function __construct($gateway = null)
    {
        $this->setGateway($gateway);
    }

    /**
     * Payment failure callback
     *
     * @param array $data failure data
     * @return JsonResponse  data regarding failure of payment
     */
    function failure($data)
    {
        $dispatch = [];
        $dispatch['message'] = isset($data['message']) ? $data['message'] : '';
        $dispatch['params'] = isset($data['params']) ? $data['params'] : '';

        return response()->json($dispatch, isset($data['status']) ? $data['status'] : 422);
    }

    /**
     * Server side header redirect
     *
     * @param $data
     * @return JsonResponse
     */
    function redirectTo($data)
    {
        if (isset($data['preRedirectActions']) && ($actions = $data['preRedirectActions']))
            foreach ($actions as $action)
                if (method_exists($this, $action))
                    app()->call([$this, $action], ['data' => $data]);

        return isset($data['redirectRoute']) ? redirect()->route($data['redirectRoute']) : redirect($data['location']);
    }

    /**
     * Payment redirect callback
     *
     * @param $data
     * @return JsonResponse
     */
    function redirect($data)
    {
        return response()->json(['location' => isset($data['location']) ? $data['location'] : ''], 301);
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
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @param $name
     * @param $arguments
     */
    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}

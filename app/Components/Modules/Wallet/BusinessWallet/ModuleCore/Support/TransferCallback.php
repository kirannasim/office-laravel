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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Support;

use App\Blueprint\Support\Transaction\Callback;
use Illuminate\Http\JsonResponse;

/**
 * Class TransferCallback
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Support
 */
class TransferCallback extends Callback
{
    /**
     * Success callback
     *
     * @param $response
     * @return array
     */
    function success($response)
    {
        defineAction('postTransferActions', 'fund_transfer', $response);

        return ['transaction' => $response['transaction'], 'status' => true];
    }

    /**
     * Payment failure callback
     *
     * @param array $data failure data
     * @return array data regarding failure of payment
     */
    function failure($data)
    {
        return [
            'message' => isset($data['message']) ? $data['message'] : null,
            'params' => isset($data['params']) ? $data['params'] : null,
            'status' => false
        ];
    }

    /**
     * Server side header redirect
     *
     * @param $data
     * @return JsonResponse
     */
    function redirectTo($data)
    {
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
}
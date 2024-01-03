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

use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Eloquents\Package;
use App\Eloquents\Transaction;
use App\Eloquents\HoldingUsers;
use App\Eloquents\User;
use Illuminate\Http\JsonResponse;
use App\Http\Helpers\MailChimp as MailChimp;
use Illuminate\Support\Collection;

/**
 * Class RegistrationCallback
 * @package App\Blueprint\Support\Transaction
 */
class ExpirationCallback extends Callback
{
    /**
     * @param OrderServices $orderServices
     * @param UserServices $userServices
     * @param $response
     * @param ExternalMailServices $externalMailServices
     * @return mixed
     */
    function success(OrderServices $orderServices, UserServices $userServices, $response, ExternalMailServices $externalMailServices)
    {
        $orderData = collect($response)->get('orderData', $orderServices->getOrderData());
        $action = 'increaseexpire';
       
        $user = app()->call([$userServices, $action], ['data' => collect($orderData)]);


        /** @var Transaction $transaction */
        $transaction = isset($response['transaction_id']) ? Transaction::find($response['transaction_id']) : isset($response['transaction'])?$response['transaction']:null;


        $payer = loggedUser() ? loggedId() : $user->id;
        if($transaction)
        {
            $transaction->update(['payer' => $payer]);    
        }
        else
        {
            return;
        }

        $order = $orderServices->addOrder(true, $user, $transaction, 1, collect($response)->get('cartDetails'));

        $redirectUrl = loggedId() ? route('home') : null;

       
        return tap(['transaction' => $transaction, 'orderId' => $order->id, 'user' => $user, 'redirectUrl' => $redirectUrl . '?registered=true&orderId=' . $order->id], function ($data) use ($externalMailServices) {
            defineAction('expireuser', 'expire', collect(['result' => $data]));
        });
    }

    /**
     * Invoice metadata
     *
     * @return array
     */
    function invoiceData()
    {
        return [
            'name' => 'Invoice',
            'excerpt' => 'Registration invoice',
        ];
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
            'message' => isset($data['message']) ? $data['message'] : '',
            'params' => isset($data['params']) ? $data['params'] : '',
            'status' => isset($data['status']) ? $data['status'] : 422
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


    /**
     * @param $response
     * @return mixed
     */
    function pending($response)
    {
        return $response;
    }

    /**
     * @param $response
     */
    


}

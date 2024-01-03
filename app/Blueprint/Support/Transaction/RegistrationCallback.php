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

use App\Blueprint\Facades\CartServer;
use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Eloquents\Country;
use App\Eloquents\Package;
use App\Eloquents\Transaction;
use App\Eloquents\HoldingUsers;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Helpers\MailChimp as MailChimp;
use Illuminate\Support\Collection;

/**
 * Class RegistrationCallback
 * @package App\Blueprint\Support\Transaction
 */
class RegistrationCallback extends Callback
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
        $action = 'addUser';
        if( isset($orderData['parent']) && isset($orderData['position']))
            $action = 'addUserDirectly';

         /** @var Transaction $transaction */
        $transaction = isset($response['transaction_id']) ? Transaction::find($response['transaction_id']) :null;
        
        $redirectUrl = loggedId() ? scopeRoute('register') : null;

        if($transaction->context == 'Registration')
        {
            $user = app()->call([$userServices, $action], ['data' => collect($orderData)]);


            $payer = $user->id;
            $transaction->update(['payer' => $payer]);

            $order = $orderServices->addOrder(true, $user, $transaction, 1, collect($response)->get('cartDetails'));



            $data= collect($orderData);

            // if (!strpos(strtolower($data['email']), '@email.com', 0)) {
            //     //sending emails about enroller register
            //     app()->call([$this, 'sendmailtoenroller'], ['data' => collect($orderData), 'order'=>collect($response)->get('cartDetails') ?? CartServer::cartTotal(), 'transaction'=>collect($transaction),'id'=>$user->id, 'isRecepeit'=>true]);
            //     app()->call([$this, 'sendmailtosponsor'],  ['data' => collect($orderData),'id'=>$user->id, 'isRegister'=>true]);

            //     //sending emails about enroller's package
            //      app()->call([$this, 'sendmailtoenroller'], ['data' => collect($orderData),'id'=>$user->id]);
            //      app()->call([$this, 'sendmailtosponsor'],  ['data' => collect($orderData),'id'=>$user->id]);
            // }

            return tap(['transaction' => $transaction, 'orderId' => $order->id, 'user' => $user, 'redirectUrl' => $redirectUrl . '?registered=true&orderId=' . $order->id], function ($data) use ($externalMailServices) {
                defineAction('postAddUser', 'registration', collect(['result' => $data]));
                defineAction('postRegistration', 'registration', collect(['result' => $data]));
               // $externalMailServices->sendRegistrationMail(['userId' => $data['user']->id]);
            });
        }
        else
        {

            return tap(['transaction'=>$transaction,'redirectUrl'=>$redirectUrl]);
        }
        
    }

    function successWHY(OrderServices $orderServices, $response)
    {

        $data['orderData'] = collect($response)->get('orderData', $orderServices->getOrderData());
        $data['cartDetails'] = collect($response)->get('cartDetails');
        $data['transaction'] = isset($response['transaction_id']) ? Transaction::find($response['transaction_id']) : $response['transaction'];

        HoldingUsers::create([
            'sponsor_id' => idFromUsername($data['orderData']['sponsor']),
            'data' => $data,
            'username' => $data['orderData']['username'],
            'email' => $data['orderData']['email'],
        ]);
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
    function sendmailtoenroller(Collection $data, $transaction = null, $order=null, $id, $isRecepeit=false, $isRegister=false, $isUpgrade=false){
        $tag = 'ENROLLER_';
        if ($isRegister) {
            $tag = $tag.'REGISTER';
        }else if($isRecepeit){
            $tag = $tag.'RECEPEIT';
        }else if($isUpgrade){
            $tag = $tag.$data['package'];
            $data['ip'] = '';
            $data['password'] = '';
        }else{
            $package = Package::where('id',$data['selectedPackage'])->first();
            $tag = $tag.strtoupper($package->slug);
        }
        $mailChimpTags[$tag] = 'active';
        MailChimp::subscribe(
            'd876d50ee6',
                   $data['email'],
            $mailChimpTags,
            [
                'FNAME' => $data['firstname'],
                'LNAME' => $data['lastname'],
                'POSITION' => $tag,
                'PASSWORD' => $data['password'],
                'ID' => $id,
                'IP' =>$transaction['created_at'],
                'ADDRESS' =>  array(
                    'addr1'   => $data['house_no'].' '.$data['street_name'],
                    'city'    => $data['city'],
                    'state'   => Country::where('id','=',UserMeta::where('user_id','=', $id)->first()->state_id)->first()->name,
                    'zip'     => $data['postcode'],
                    'country' => Country::find($data['country_id'])->first()->name,
                ),
                'CODE'=> $data['postcode'],
                'COUNTRY' => Country::where('id',$data['country_id'])->first()->name,
                'PAYOPTION'=>ucfirst($data['payment']),
                'PAYDATE'  =>Carbon::parse($transaction['created_at'])->format('Y-m-d'),
                'PAYTIME'  =>Carbon::parse($transaction['created_at'])->format('H:i:s'),
                'CLIENT_REG'=>$transaction['id'],
                'PRICE' => $order['subTotal'],
                'ADMINFEE'=>$order['fees'][0]['amount'],
                'TOTAL' => $order['total']
            ],
            [
                'ip_signup' => $data['ip'],
            ]
        );
    }


    /**
     * @param $response
     */
    function sendmailtosponsor(Collection $data, $id,  $isRegister=false){
        $package  = Package::find($data['selectedPackage'])->first();
        $tag  = strtoupper($package->slug);
        if($isRegister){
            $tag = 'REGISTER';
        }
        $mailChimpTags['SPONSOR_'.strtoupper($package->slug)] = 'active';
        MailChimp::subscribe(
            'd876d50ee6',
            $data['email'],
            $mailChimpTags,
            [
                'FNAME' => $data['firstname'],
                'LNAME' => $data['lastname'],
                'POSITION' => $tag,
                'EMAIL' => $data['email'],
                'PHONE' => $data['phone_code'].$data['phone'],
                'ID' => $id
            ],
            [
                'ip_signup' => $data['ip'],
            ]
        );
    }


}

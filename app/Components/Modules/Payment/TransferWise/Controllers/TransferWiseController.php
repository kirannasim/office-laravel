<?php

namespace App\Components\Modules\Payment\TransferWise\Controllers;

use App\Components\Modules\Payment\TransferWise\TransferWiseIndex as Module;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents\TransferWiseHistory;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents\TransferWiseTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Eloquents\User;
use App\Eloquents\Country;

/**
 * Class TransferWiseController
 * @package App\Components\Modules\Payment\TransferWise\Controllers
 */
class TransferWiseController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }


    function test()
    {
        $token = callModule($this->module->moduleId, 'getToken');
        callModule($this->module->moduleId, 'getpayment', ['token' => $token]);
    }


    /**
     * @return string
     * @throws \Throwable
     */
    function Success(Request $request)
    {
        $username = $request->input('username');
        $payment = $request->input('payment');
         $user = User::where('username',$username)->first();
        $data = [
            'moduleId' => $this->module->moduleId,
            'data'=>callModule($this->module->moduleId, 'getModuleData'),
            'user'=>$user,
            'payment'=>$payment
        ];

        
       

        if($username)
        {
            $info = $this->createuser($request);    
            $data['amount'] = $info['amount'];    
            $data['user'] = $info['user'];

        }

        return view('Payment.TransferWise.Views.success', $data)->render();
    }

    function CountryFilter(Request $request)
    {
        $country = $request->input('country');

        $countrylist = ['AT','BE','CY','EE','FI','FR','DE','GR','IE','IT','LV','LT','LU','MT','MC','AN','NL','PT','SM','SK','SI','ES','BG','HR','CZ','DK','HU','IS','LI','NO','PL','RO','SE','CH','UK'];

        $countryinfo = Country::find($country);

        if($countryinfo)
        {
            if(in_array($countryinfo->code, $countrylist))
            {
                echo json_encode(array('success'=>true));
            }
            else
            {
                echo json_encode(array('success'=>false));
            }
        }
        else
        {
            echo json_encode(array('success'=>false));
        }
    }

    /**
     * @return string
     * @throws \Throwable
     */
    function Cancel()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];
        return view('Payment.TransferWise.Views.cancel', $data)->render();
    }

    function createuser(Request $request)
    {
        $username = $request->input('username');
        DB::transaction(function () use ($request) {
            $username = $request->input('username');
            

    //        $address = '5e2697a10ee97fc79250f8c5b804390e8da280b4cf06e';
            $transferwise = TransferWiseTransaction::where('reference', $username)->first();



            if ($transferwise && $transferwise->status == 0) {

                
                $callback = new $transferwise->callback;


                $order = app()->call([$callback, 'success'], ['response' => $transferwise->data]);
                $user = User::where('username',$username)->first();
                if($user)
                {
                    TransferWiseTransaction::where('reference', $username)->update(['status' => 1,'reference'=>$user->customer_id]);    
                }
                
            }
            else
            {
                $user = User::where("username",$username)->first();
                $transferwise = TransferWiseTransaction::where('reference',$user->customer_id)->first();
            }
        });
        $transferwise = TransferWiseTransaction::where('reference', $username)->first();
        $user = User::where("username",$username)->first();
        if(!$transferwise)
        {
            $transferwise = TransferWiseTransaction::where('reference',$user->customer_id)->first();
        }

        if($transferwise)
        {
            return array('amount'=>$transferwise->amount,'user'=>$user);    
        }
        
    }

    function callBack(Request $request)
    {
        // TransferWiseHistory::create([
        //     'getParams' => $_GET,
        //     'postParams' => json_encode($_POST),
        // ]);



        return ['success'=>true];
    }

    function getstatus(Request $request)
    {
        $merchantOrderID = $require->get("merchantOrderID");
        $moduleData = callModule($this->moduleId,'getModuleData',true);
        $endpoint = $moduleData->get('endpointid');
        $mechanicid = $moduleData->get('mechanicid');
        $mechanicsecret = $moduleData->get('mechanicsecret');


        $curl = curl_init();
         curl_setopt_array($curl, array(
            CURLOPT_URL => $url . "/api/v1/deposit/request/" . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
    }
}
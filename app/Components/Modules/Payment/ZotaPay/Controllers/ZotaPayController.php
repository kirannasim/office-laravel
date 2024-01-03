<?php

namespace App\Components\Modules\Payment\ZotaPay\Controllers;

use App\Components\Modules\Payment\ZotaPay\ZotaPayIndex as Module;
use App\Components\Modules\Payment\ZotaPay\ModuleCore\Eloquents\ZotaPayHistory;
use App\Components\Modules\Payment\ZotaPay\ModuleCore\Eloquents\ZotaPayTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ZotaPayController
 * @package App\Components\Modules\Payment\ZotaPay\Controllers
 */
class ZotaPayController extends Controller
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
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        $this->createuser($request);

        return view('Payment.ZotaPay.Views.success', $data)->render();
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
        return view('Payment.ZotaPay.Views.cancel', $data)->render();
    }

    function createuser(Request $request)
    {
            DB::transaction(function () use ($request) {
            $merchantOrderID = $request->input('merchantOrderID');
            $orderID = $request->input('orderID');
            $data = callModule($this->module->moduleId,'getstatus',['merchantOrderID'=>$merchantOrderID,'orderID'=>$orderID]);

            if($data && $data['status'] != 'APPROVED')
            {
                return;
            }


    //        $address = '5e2697a10ee97fc79250f8c5b804390e8da280b4cf06e';
            $ZotaTransactions = ZotaPayTransaction::where('address', $merchantOrderID)->first();



            if (!$ZotaTransactions->status && $request->input('status') == 'APPROVED' && $request->input('orderID') == $ZotaTransactions->local_txn_id) {

                ZotaPayHistory::create([
                    'getParams' => $data,
                    'postParams' => $_POST,
                ]);

                
                $callback = new $ZotaTransactions->callback;

                $order = app()->call([$callback, 'success'], ['response' => $ZotaTransactions->data]);
                
                ZotaPayTransaction::where('address', $merchantOrderID)->update(['status' => 1]);
            }
        });
    }

    function callBack(Request $request)
    {
        // ZotaPayHistory::create([
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
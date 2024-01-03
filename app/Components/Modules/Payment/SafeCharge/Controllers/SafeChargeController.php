<?php

namespace App\Components\Modules\Payment\SafeCharge\Controllers;

use App\Components\Modules\Payment\SafeCharge\SafeChargeIndex as Module;
use App\Components\Modules\Payment\SafeCharge\ModuleCore\Eloquents\SafeChargeHistory;
use App\Components\Modules\Payment\SafeCharge\ModuleCore\Eloquents\SafeChargeTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SafeCharge\Api\RestClient;
use SafeCharge\Tests\SimpleData;  
use SafeCharge\Tests\TestCaseHelper;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../TestCaseHelper.php';

/**
 * Class SafeChargeController
 * @package App\Components\Modules\Payment\SafeCharge\Controllers
 */
class SafeChargeController extends Controller
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
    function payment(Request $request)
    {
        $productid = $_POST['productid'];
        
        $data = [
            'moduleId' => $this->module->moduleId,
            'productid'=>$productid
        ];

        //$this->createuser($request);

        return view('Payment.SafeCharge.Views.payment', $data)->render();
    }

    function success(Request $request)
    {
        
        return view('Payment.SafeCharge.Views.success');
    }

    function pay()
    {
        $moduledata = callModule($this->module->moduleId,'getModuleData');
        $config = [
            'environment'       => \SafeCharge\Api\Environment::TEST,
            'merchantId'        => $moduledata['merchant_id'],
            'merchantSiteId'    => $moduledata['merchant_site_id'],
            'merchantSecretKey' => $moduledata['merchant_secret_key'],
            'hashAlgorithm'     => 'sha256'
        ];

        $datainput = $_POST;
        $inputdata = SafeChargeTransaction::where(['address'=>$datainput['productid']])->first();

        if($inputdata)
        {
            try
            {
                $data = json_decode($inputdata->data,true);

                $safecharge = new \SafeCharge\Api\SafeCharge();
                $safecharge->initialize($config);
                $paymentResponse = $safecharge->getPaymentService()->initPayment([
                    'currency'       => 'EUR',
                    'amount'         => 11,
                    'userTokenId'    => TestCaseHelper::getUserTokenId($config),
                    'billingAddress' => [
                        "firstName" => $data['firstname'],
                        "lastName"  => $data['lastname'],
                        "address"   => $data['street_name'],
                        "phone"     => $data['phone_code'] . $data['phone'],
                        "zip"       => $data['postcode'],
                        "city"      => $data['city'],
                        'country'   => $data['address_country'],
                        "state"     => $data['state'],
                        "email"     => $data['email'][0]
                    ],
                    'paymentOption'=>[
                        'card'=>[
                            'cardNumber'=>$datainput['card_number'],
                            'cardHolderName'=>'safe charge',
                            'expirationMonth' => explode('/', $datainput['expiration'])[0],
                            'expirationYear'  => explode('/', $datainput['expiration'])[1],
                            'CVV'             => $datainput['CV'],
                        ]
                    ]
                ]);    
                if($paymentResponse['transactionStatus'] == 'APPROVE')
                {
                    redirect(scopeRoute('SafeCharge.success'));
                }    
            }
            catch(Exception $e)
            {
                var_dump($e->message);
            }
        }
        
    }
    /**
     * @return string
     * @throws \Throwable
     */
    function Cancel(Request $request)
    {
        $postdata = file_get_contents("php://input");
        $postdata = explode('&',$postdata);

        $data = array();

        foreach ($poredata as $key => $value) {
            $value_array = explode("=", $value);
            $data[$value_array[0]] = join(' ',explode('+', $value_array[1]));
        }

        $data_array = [
            'moduleId' => $this->module->moduleId,
            'data'=>$data
        ];
        return view('Payment.SafeCharge.Views.cancel', $data_array)->render();
    }

    function createuser($data,$productid)
    {
        if(!isset($productid))
        {
            return false;
        }

        DB::transaction(function () use ($request) {
    //        $address = '5e2697a10ee97fc79250f8c5b804390e8da280b4cf06e';
            $SafeChargetransaction = SafeChargeTransaction::where('address', $productid)->first();


            if (!$SafeChargetransaction->status && $data['status'] == 'succcess') {
                
                $callback = new $SafeChargeTransaction->callback;

                $order = app()->call([$callback, 'success'], ['response' => $SafeChargetransaction->data]);
                
                ZotaPayTransaction::where('address', $productid)->update(['status' => 1]);
            }
        });
    }   

    function callBack(Request $request)
    {
        $postdata = file_get_contents('php://input');
        //$postdata = json_decode($postdata,true);
        SafeChargeHistory::create([
            'getParams' => $_GET,
            'postParams' => $postdata,
        ]);

        $this->createuser($postdata);

        return ['success'=>true];
    }

    function getstatus($postdata)
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
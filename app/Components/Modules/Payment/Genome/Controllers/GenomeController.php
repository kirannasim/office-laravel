<?php

namespace App\Components\Modules\Payment\Genome\Controllers;

use App\Components\Modules\Payment\Genome\GenomeIndex as Module;
use App\Components\Modules\Payment\Genome\ModuleCore\Eloquents\GenomeHistory;
use App\Components\Modules\Payment\Genome\ModuleCore\Eloquents\GenomeTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Genome\Lib\Model\FixedProduct;
use Genome\Lib\Model\UserInfo;
use Genome\Scriney;

require dirname(__FILE__) . '/../hpp/vendor/autoload.php';
/**
 * Class GenomeController
 * @package App\Components\Modules\Payment\Genome\Controllers
 */
class GenomeController extends Controller
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

        //$this->createuser($request);

        return view('Payment.Genome.Views.success', $data)->render();
    }

    function payment(Request $request)
    {
        $productid = $_POST["productid"];
        $moduledata = callModule($this->module->moduleId, 'getModuleData');

        $public_key = $moduledata["pub_key"];
        $private_key = $moduledata["priv_key"];

        $scriny = new Scriney($public_key,$private_key); 
        $username = $_POST['username'];
        $iframe = $scriny
        ->buildButton($username)
        ->setSuccessReturnUrl(route("Genome.success"))
        ->setDeclineReturnUrl(route("Genome.cancel"))
        ->setUserInfo(
            new UserInfo(
                $_POST['email'],
                $_POST['firstname'],
                $_POST['lastname']
            )
        );

        if(!isset($_POST['subscription']) || !$_POST['subscription'])
        {
            $iframe->setCustomProducts(
                [
                    new FixedProduct(
                        $productid,
                        "Payment",
                        (int)$_POST['price'],
                        "EUR"
                    )
                ]
            );
        }
        else
        {
            $iframe->setCustomProducts([
                new SubscriptionProduct(
                    $productid,
                    "Payment",
                    (int)$_POST['price'],
                    "EUR",
                    1,
                    "30D"
                )
            ]);
        }
        
        $iframe->setpaymentmethod($_POST['paymentmethod']);
        $iframe = $iframe->buildFrame();

        

        return view('Payment.Genome.Views.payment',array('html'=>$iframe));
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
        return view('Payment.Genome.Views.cancel', $data_array)->render();
    }

    function createuser($data)
    {
        if(!isset($data['productLire']))
        {
            return false;
        }

        DB::transaction(function () use ($request) {
            $productlist = $data['productList'];
            
            if(count($productlist) == 0 || $data["status"] != "success")
            {
                return;
            }


    //        $address = '5e2697a10ee97fc79250f8c5b804390e8da280b4cf06e';
            $genometransaction = GenomeTransaction::where('address', $productlist[0]["productId"])->first();


            if (!$genometransaction->status && $data['status'] == 'succcess') {
                
                $callback = new $GenomeTransaction->callback;

                $order = app()->call([$callback, 'success'], ['response' => $genometransaction->data]);
                
                ZotaPayTransaction::where('address', $productList["productId"])->update(['status' => 1]);
            }
        });
    }   

    function callBack(Request $request)
    {
        $postdata = file_get_contents('php://input');
        //$postdata = json_decode($postdata,true);
        GenomeHistory::create([
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
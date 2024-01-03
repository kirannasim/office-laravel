<?php

namespace App\Components\Modules\Payment\SafeCharge;

use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\SafeCharge\ModuleCore\Eloquents\SafeChargeTransaction;
use App\Components\Modules\Payment\SafeCharge\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\SafeCharge\ModuleCore\Traits\Routes;
use Hash;





/**
 * Class SafeChargeIndex
 * @package App\Components\Modules\Payment\SafeCharge
 */
class SafeChargeIndex extends PaymentModuleAbstract
{
    use Routes, Hooks;

    protected $encryptedValues = ['key', 'wallet', 'secret'];

    function renderView()
    {
        $data = [
            'styles' => [
                $this->getCssPath() . 'style.css',
            ],
            'moduleId' => $this->moduleId,
        ];


        return view('Payment.SafeCharge.Views.SafeChargeIndex', $data)->render();
    }

    /**
     * handle admin settings
     *
     * @param array $data
     * @return Factory|View
     */
    function adminConfig($data = [])
    {
        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js')
            ],
            'styles' => [],
            'moduleId' => $this->moduleId,
            'config' => $this->getModuleData(true)
        ];

        return view('Payment.SafeCharge.Views.adminConfig', $data);
    }

    /**
     * @param bool $returnCollection
     * @return array|Collection
     */
    function getModuleData($returnCollection = false)
    {
        $data = parent::getModuleData(true)->mapWithKeys(function ($value, $key) {
            return [$key => in_array($key, $this->encryptedValues) ? decrypt($value) : $value];
        });

        return $returnCollection ? $data : $data->all();
    }

    /**
     * @param Payable $payable
     * @param TransactionServices $transactionServices
     * @param PaymentServices $paymentServices
     * @return mixed
     */


    function processPayment(Payable $payable, TransactionServices $transactionServices, PaymentServices $paymentServices)
    {
        $data = $_POST;
        $moduledata = $this->getModuleData();
        
        $productid = uniqid('product_');

        SafeChargeTransaction::create([
            "address"=>$productid,
            "callback"=>get_class($paymentServices->getCallback()),
            "amount"=>$payable->getTotal(),
            "context"=>$payable->getContext(),
            "data"=>json_encode($data),
            "status"=>0
        ]);

        return defineFilter('paymentGatewayResponse',[
            'message'=>json_encode(['productid'=>$productid])
        ]);
        
    }

    function getstatus($merchantOrderID,$orderID)
    {
        $moduleData = $this->getModuleData(true);

        $url = $moduleData->get('url');
        $endpoint = $moduleData->get('endpointid');
        $mechanicid = $moduleData->get('mechanicid');
        $mechanicsecret = $moduleData->get('mechanicsecret');
        $time = time();

        $signature = hash("sha256",$mechanicid . $merchantOrderID . $orderID . $time.$mechanicsecret);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . "/api/v1/query/order-status?merchantOrderID=" . $merchantOrderID . '&merchantID=' . $mechanicid . '&orderID=' . $orderID . '&signature=' . $signature . '&timestamp=' . $time,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        
        if($err)
        {
            return false;
        }
        else
        {
            $response = json_decode($response,true);

            if($response['code'] != 200)
            {
                return false;
            }
            else
            {
                return $response['data'];    
            }
            
        }
    }

    /**
     * @param $amount
     * @param $context
     * @return mixed
     */
    function getPayment($amount, $data)
    {
        
        $moduleData = $this->getModuleData(true);
        // Adding transaction record with operation details
        

    }

    function getToken()
    {
        
    }

   

    /**
     * @param array $moduleData
     * @return mixed
     */
    function preProcessModuleData($moduleData = [])
    {
        return collect($moduleData)->mapWithKeys(function ($value, $key) {
            return [$key => in_array($key, $this->encryptedValues) ? encrypt($value) : $value];
        })->all();
    }

    /**
     * handle module installations
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module uninstallation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.*' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationAttributes()
    {
        return [
            'module_data.url' => 'Domain',
            'module_data.wallet' => 'Wallet',
            'module_data.key' => 'Key',
            'module_data.secret' => 'Secret',
        ];
    }

}
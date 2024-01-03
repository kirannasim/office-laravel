<?php

namespace App\Components\Modules\Payment\TransferWise;

use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents\TransferWiseTransaction;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Traits\Routes;
use App\Eloquents\Country;
use App\Eloquents\City;
use App\Eloquents\State;
use Illuminate\Http\Request;
use Hash;
/**
 * Class TransferWiseIndex
 * @package App\Components\Modules\Payment\TransferWise
 */
class TransferWiseIndex extends PaymentModuleAbstract
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


        return view('Payment.TransferWise.Views.TransferWiseIndex', $data)->render();
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

        return view('Payment.TransferWise.Views.adminConfig', $data);
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

        $datainput = $_POST;
       
        $context= $payable->getContext();
        
        if($context == 'package_upgrade')
        {
            $user = loggedUser();
            $datainput = ['username'=>$user->username];

        }
        $datatransfer = TransferWiseTransaction::where('reference',$datainput['username'])->first();
        if(!$datatransfer)
        {
             // Setting necessary vars in Payable
            $payable->setFromModule($this->moduleId);
            // Adding transaction record with operation details
            $transaction = $transactionServices
                ->processTransaction($payable)
                ->setOperation()
                ->setCharges()->getTransaction();   

           
            //$payment = $this->getPayment((double)$payable->getTotal(), $datainput);


            
            TransferWiseTransaction::create([
                'reference' => $datainput['username'],
                'callback' => get_class($paymentServices->getCallback()),
                'amount' => $payable->getTotal(),
                'context' => $payable->getContext(),
                'data' => defineFilter("pendingCallbackResponse", [], $context, $transaction),
                'status' => 0
            ]);

            return defineFilter('paymentGatewayResponse', [
                'message' => $datainput['username'],
                'transaction' => $transaction,
                'redirectUri' => route('transferwise.success')
            ]);    
        }
        else
        {
            $paymentServices->setError('You have pending Transaction for TransferWise',422);
        }
        
    }

    function getprofileid()
    {
        $moduledata = $this->getModuleData();
    }

    /*
     * @param array $moduleData
     * @return mixed
     */
    function preProcessModuleData($moduleData = [])
    {
        return collect($moduleData)->mapWithKeys(function ($value, $key) {
            return [$key => in_array($key, $this->encryptedValues) ? encrypt($value) : $value];
        })->all();
    }

    function getprofile()
    {
        $url = 'https://api.transferwise.com';
        $moduledata = $this->getModuleData();
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url . '/v1/profiles',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "Authorization: Bearer " . $moduledata['api_key']
            )
        ));

        $response = curl_exec($ch);
         $error = curl_error($ch);
        if($response && !$error)
        {
            return json_decode($response,true);    
        }
        else
        {
            var_dump($error);
            return array();
        }
        
    }

    function gettransfer($starttime,$endtime,$profileid)
    {
        $starttime = $starttime->format('Y-m-d H:i:s');
        $endtime = $endtime->format('Y-m-d H:i:s');

        $starttime = join('T',preg_split('/ /', $starttime));
        $endtime = join('T',preg_split('/ /', $endtime));
        $url = 'https://api.transferwise.com';
        $moduledata = $this->getModuleData();
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url . '/v1/transfers?offset=0&limit=200&profile=' . $profileid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "Authorization: Bearer " . $moduledata['api_key']
            )
        ));

        $response = curl_exec($ch);

        $error = curl_error($ch);
        if($response && !$error)
        {
            return json_decode($response,true);       
        }
        else
        {
            var_dump($error);
            return array();
        }
        
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
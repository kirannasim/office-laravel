<?php

namespace App\Components\Modules\Payment\ZotaPay;

use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\ZotaPay\ModuleCore\Eloquents\ZotaPayTransaction;
use App\Components\Modules\Payment\ZotaPay\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\ZotaPay\ModuleCore\Traits\Routes;
use App\Eloquents\Country;
use App\Eloquents\City;
use App\Eloquents\State;
use Illuminate\Http\Request;
use Hash;
/**
 * Class ZotaPayIndex
 * @package App\Components\Modules\Payment\ZotaPay
 */
class ZotaPayIndex extends PaymentModuleAbstract
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


        return view('Payment.ZotaPay.Views.ZotaPayIndex', $data)->render();
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

        return view('Payment.ZotaPay.Views.adminConfig', $data);
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

        // Setting necessary vars in Payable
        $payable->setFromModule($this->moduleId);
        // Adding transaction record with operation details
        $transaction = $transactionServices
            ->processTransaction($payable)
            ->setOperation()
            ->setCharges()->getTransaction();   

        $transaction->update(['status' => false]);
        $nextAction = 'pending';
        $datainput = $_POST;
        if($datainput['expire'] && loggedUser())
        {
            $user = loggedUser();
            $country = Country::find($user->metaData->country_id);
            $datainput['email'] = $user->email;
            $datainput['firstname'] = $user->metaData->firstname;
            $datainput['lastname'] = $user->metaData->lastname;
            $datainput['street_name'] = $user->metaData->address;
            $datainput['address_country'] = Country::find($user->metaData->country_id)->code;
            $datainput['city'] = City::find($user->metaData->city_id)->name;
            $datainput['postcode'] = $user->metaData->postcode;
            $datainput['phone_code'] = $country->phonecode;
            $datainput['phone'] = $user->phone;
            $datainput['state'] = State::find($user->metaData->state_id)->name;
        }

        $payment = $this->getPayment((double)$payable->getTotal(), $datainput);

        $context= $payable->getContext();

        if($payment->code == '200')
        {
            ZotaPayTransaction::create([
                'address' => $payment->data->merchantOrderID,
                'callback' => get_class($paymentServices->getCallback()),
                'amount' => $payable->getTotal(),
                'local_txn_id' => $payment->data->orderID,
                'context' => $payable->getContext(),
                'data' => defineFilter("{$nextAction}CallbackResponse", [], $context, $transaction),
                'status' => 0
            ]);

            return defineFilter('paymentGatewayResponse', [
                'message' => 'success',
                'next' => $nextAction,
                'transaction' => $transaction,
                'redirectUri' => $payment->data->depositUrl,
            ]);    
        }
        else
        {
            return defineFilter('paymentGatewayResponse', [
                'message' => 'error',
            ]);   
        }
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
        $url = $moduleData->get('url');
        $endpoint = $moduleData->get('endpointid');
        $mechanicid = $moduleData->get('mechanicid');
        $mechanicsecret = $moduleData->get('mechanicsecret');

        $orderid = uniqid("order");


        $hash = hash("sha256",$endpoint . $orderid . $amount . $data['email'].$mechanicsecret);
        

        $curl = curl_init();

        $data['state'] = isset($data['state'])?$data['state']:"";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . "/api/v1/deposit/request/" . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "merchantOrderID=" . $orderid . '&merchantOrderDesc=test&orderAmount=' . $amount . '&orderCurrency=USD&customerEmail=' . $data['email'] . '&customerFirstName=' . $data['firstname'] . '&customerLastName=' . $data['lastname'] . '&customerAddress=' . $data['street_name'] . '&customerCountryCode=' . $data['address_country'] . '&customerCity=' . $data['city'] . '&customerZipCode=' . $data['postcode'] . '&customerPhone=' . $data['phone_code'] . $data['phone'] . '&customerIP=' . $_SERVER['REMOTE_ADDR'] . '&redirectUrl=' . route('zota.success') . '&callbackUrl=' . route('zota.callBack') . '&checkoutUrl=' . route('zota.success') . '&signature=' . $hash . '&customerState=' . $data['state'], 
        ));


        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    function getToken()
    {
        
    }

    /**
     * @param $amount
     * @return bool|string
     */
    function getBtcAmount($amount)
    {
        $url = 'https://blockchain.info/tobtc?currency=EUR&value=' . $amount;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);

        return $server_output;
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
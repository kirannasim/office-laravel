<?php

namespace App\Components\Modules\Payment\B2BPay;

use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\B2BPay\ModuleCore\Eloquents\B2BPayTransaction;
use App\Components\Modules\Payment\B2BPay\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\B2BPay\ModuleCore\Traits\Routes;

/**
 * Class B2BPayIndex
 * @package App\Components\Modules\Payment\B2BPay
 */
class B2BPayIndex extends PaymentModuleAbstract
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


        return view('Payment.B2BPay.Views.B2BPayIndex', $data)->render();
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

        return view('Payment.B2BPay.Views.adminConfig', $data);
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
        $payment = $this->getPayment((double)$this->getBtcAmount($payable->getTotal()), $transaction->id);

        $context = $payable->getContext();

        B2BPayTransaction::create([
            'address' => $payment->data->address,
            'callback' => get_class($paymentServices->getCallback()),
            'amount' => $payable->getTotal(),
            'local_txn_id' => $transaction->id,
            'context' => $payable->getContext(),
            'data' => defineFilter("{$nextAction}CallbackResponse", [], $context, $transaction),
            'status' => 0
        ]);


        $content = $this->getview($payment->data->url);
        return defineFilter('paymentGatewayResponse', [
            'message' => 'success',
            'next' => $nextAction,
            'content'=>$content,
            'transaction' => $transaction,
            'redirectUri' => $payment->data->url,
            'url'=>route('b2b.success')
        ]);
    }

    function getview($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);

        $dom = new \DOMDocument;
        @$dom->loadHTML($response);
        $finder = new \DOMXPath($dom);
        $classname = 'panel';
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

        $doc = new \DOMDocument;
        foreach ($nodes as $element) {
            $node = $doc->importNode($element,true);
            $doc->appendChild($node);
        }

        $xpath = new \DOMXPath($doc);
        $classname = 'return-block';
        $elements = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
        foreach($elements as $element)
        {
            $element->parentNode->removeChild($element);
        }

        
        return $doc->saveHTML();
    }

    /**
     * @param $amount
     * @param $context
     * @return mixed
     */
    function getPayment($amount, $transactionId)
    {
        $token = $this->getToken();
        $moduleData = $this->getModuleData(true);
        $url = $moduleData->get('url');
        //$amount = $this->getBtcAmount($amount);
        //$amount = bcmul($amount, 100000000, 8);

        $amount = 1;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => " https://btc.b2binpay.com/v1/pay/bills",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "wallet=".$moduleData->get('wallet')."&amount=$amount&lifetime=0&pow=8&tracking_id=$transactionId&callback_url=" . route('b2b.callBack') . "&success_url=" . route('b2b.success') . "&error_url=" . route('b2b.cancel'),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer $token",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        var_dump($token);
        var_dump("wallet=".$moduleData->get('wallet')."&amount=$amount&lifetime=0&pow=8&tracking_id=$transactionId&callback_url=" . route('b2b.callBack') . "&success_url=" . route('b2b.success') . "&error_url=" . route('b2b.cancel'));
        var_dump($err);
        var_dump($response);exit;
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    function getToken()
    {
        $moduleData = $this->getModuleData(true);
        $url = $moduleData->get('url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . "/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode($moduleData->get('key') . ':' . $moduleData->get('secret'))
            ),
        ));

        var_dump("Authorization: Basic " . base64_encode($moduleData->get('key') . ':' . $moduleData->get('secret')));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response)->access_token;
        }
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
        var_dump($server_output);
        var_dump($amount);
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
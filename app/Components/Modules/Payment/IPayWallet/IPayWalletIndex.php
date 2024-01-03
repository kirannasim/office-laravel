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

namespace App\Components\Modules\Payment\IPayWallet;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits\BootMethods;
use App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\IPayWallet\ModuleCore\Traits\Routes;
use App\Components\Modules\Wallet\IPayWallet\ModuleCore\Eloquents\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class IPayWalletIndex
 * @package App\Components\Modules\Payment\IPayWallet
 */
class IPayWalletIndex extends PaymentModuleAbstract
{
    use Hooks, BootMethods, Routes;

    protected $service;

    protected $wallet;
    private $encryptedValues = array();

    /**
     * @param ModuleServices $moduleServices
     */
    function initialize(ModuleServices $moduleServices)
    {
        $this->setService(app(PaymentServices::class))
            ->setWallet($moduleServices->callModule('Wallet-IPayWallet'));
    }

    /**
     * Render payment page view
     *
     * @return string
     * @throws \Throwable
     */
    function renderView()
    {
        $styles[] = $this->addCss('style.css');
        $data['styles'] = $styles;
        $data['id'] = $this->moduleId;
        $data['moduleId'] = $this->moduleId;
        $data['walletBalance'] = $this->getWallet()->getBalance(loggedUser());

        return view('Payment.IPayWallet.Views.payment', $data)->render();
    }

    /**
     * Process Payment
     *
     * @param Payable $payable
     * @param TransactionServices $transactionServices
     * @return array
     */
    function processPayment(Payable $payable, TransactionServices $transactionServices)
    {
        // Setting necessary vars in Payable
        $payable->setFromModule($this->getWallet()->moduleId);
        // Adding transaction record with operation details
        $transaction = $transactionServices
            ->processTransaction($payable)
            ->setOperation()
            ->setCharges();

        getModule((int)$payable->getFromModule())->updateCache($payable->getPayer());
        getModule((int)$payable->getToModule())->updateCache($payable->getPayee());

        $payer = $payable->getPayer();
        $payee = $payable->getPayee();

        $reference = uniqid('ref_');

        $account_to_load = array(array(
            'UserName'=>$payer->username,
            'Amount'=>$payable->gettotal(),
            'Comments'=>"",
            'MerchantReferenceID'=>$reference
        ));

        $moduledata = $this->getModuleData();

        $MerchantGUID = $moduleData['merchantId'];
        $MerchantPassword = $moduleData['merchantPassword'];
        $currency = $moduleData["currency"];


        $params = array(
            'fn'   => 'eWallet_Load',
            'MerchantGUID'      => $MerchantGUID,
            'MerchantPassword'  => $MerchantPassword,
            'PartnerBatchID'    => $payee->username,
            'PoolID'            => '',
            'arrAccounts'       => $accounts_to_load,
            'CurrencyCode'      => $currency
        );

        $request = json_encode($params);
        $ch = curl_init('https://testewallet.com/eWalletWS/ws_JsonAdapter.aspx');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ips_response = curl_exec($ch);
        $ips_response = json_decode($ips_response);

        $error = curl_error($ch);
        curl_close($ch);

        if($error || !$ips_response->m_Code)
        {
            return [
                'message' => $ips_response->m_Text,
                'next' => 'success',
                'transaction' => $transaction->transaction,
            ];    
        }
        else
        {
            return [
                'message' => 'success',
                'next' => 'success',
                'transaction' => $transaction->transaction,
            ];    
        }
        
    }

    function getModuleData($returnCollection = false)
    {
        $data = parent::getModuleData(true)->mapWithKeys(function ($value, $key) {
            return [$key => in_array($key, $this->encryptedValues) ? decrypt($value) : $value];
        });

        return $returnCollection ? $data : $data->all();
    }
     /**
     * @return Factory|View|mixed
     * @throws Throwable
     */
    function adminConfig()
    {
        $moduleServices = app(ModuleServices::class);
        $wallets = collect($moduleServices->getWalletPool('active'))->filter(function ($wallet) use ($moduleServices) {
            if ($wallet->moduleId != $moduleServices->callModule('Wallet-BusinessWallet')->moduleId) return true;
        });

        $config = collect(['fund_transfer_restricted_to' => 'all']);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'styles'=>[],
            'wallets' => $wallets,
            'moduleId' => $this->moduleId,
            'config' => $config
        ];

        return view('Payment.IPayWallet.Views.adminConfig', $data)->render();
    }

    
    

    /**
     * check whether transaction password is valid not
     *
     * @param Request $request
     * @param null $transactionPassword
     * @param PaymentServices $paymentServices
     * @return bool
     */
    function checkTransactionPassword(Request $request, $transactionPassword = null, PaymentServices $paymentServices)
    {
        if ($paymentServices->isAuthorized()) return true;

        $transactionPassword = $request->input('transactionPass', $transactionPassword);

        if ($transactionPassword && User::find(loggedId())->walletData && Hash::check($transactionPassword, User::find(loggedId())->walletData->transaction_password)) {
            $paymentServices->setAuthorized(true);
            return true;
        }

        return false;
    }

    /**
     * @param $amount
     * @return bool
     */
    function hasSufficientBalance($amount)
    {
        if ($amount > User::find(loggedId())->balance())
            return false;

        return true;
    }

    /**
     * Get the preferred payable object
     *
     * @return mixed
     */
    function getPayable()
    {
        return Payable::class;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     * @return IPayWalletIndex
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    function createuser($user)
    {
        $moduleData = $this->getModuleData();
        $MerchantGUID = $moduleData['merchantId'];
        $MerchantPassword = $moduleData['merchantPassword'];
        $currency = $moduleData["currency"];

        $params = array(
            'fn'                => 'eWallet_GetCurrencyBalance',
            'MerchantGUID'      => $MerchantGUID,
            'MerchantPassword'  => $MerchantPassword,
            'UserName'          => $user->username,
            'CurrencyCode'      => $currency
        );

        $apiurl = 'https://testewallet.com/eWalletWS/ws_JsonAdapter.aspx';
        $request = json_encode($params);
        $ch = curl_init($apiurl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ips_response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if(!$error)
        {
            $ips_response = json_decode($ips_response);    
        }
        


        if($error || $ips_response->response->m_Code == 0)
        {
            $ch = curl_init($apiurl);
            $params = array(
                'fn'                => 'eWallet_RegisterUser',
                'MerchantGUID'      => $MerchantGUID,
                'MerchantPassword'  => $MerchantPassword,
                'UserName'          => $user->username,
                'FirstName'         => $user->metaData->firstname,
                'LastName'          => $user->metaData->lastname,
                'EmailAddress'      => $user->email,
                'DateOfBirth'       => $user->metaData->dob,
                'WebsitePassword'   => 'passw0rd',
                'DefaultCurrency'   => $currency
            );

            $request = json_encode($params);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $ips_response = curl_exec($ch);
            curl_close($ch);

            return 0;        
        }   
        else
        {
            return $ips_response->Balance;
        }

    }

    /**
     * @return mixed|ModuleBasicAbstract|WalletModuleInterface
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param mixed $wallet
     * @return IPayWalletIndex
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }
}

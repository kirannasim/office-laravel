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

namespace App\Components\Modules\Payment\BusinessWallet;

use App\Blueprint\Facades\CartServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits\BootMethods;
use App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\BusinessWallet\ModuleCore\Traits\Routes;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Eloquents\TransactionOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


/**
 * Class BusinessWalletIndex
 * @package App\Components\Modules\Payment\BusinessWallet
 */
class BusinessWalletIndex extends PaymentModuleAbstract
{
    use Hooks, Routes, BootMethods;
    static $clearCache = true;

    protected $service;

    protected $wallet;

    /**
     * @param ModuleServices $moduleServices
     */
    function initialize(ModuleServices $moduleServices)
    {
        $this->setService(app(PaymentServices::class))
            ->setWallet($moduleServices->callModule('Wallet-BusinessWallet'));
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
        $data['walletBalance'] = User::companyUser()->balance();

        return view('Payment.BusinessWallet.Views.payment', $data)->render();
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
        if ($payable->context != 'deduct' && $payable->context != 'commission')
            $payable->setFromModule($this->getWallet()->moduleId);

        // Adding transaction record with operation details
        $transaction = $transactionServices
            ->processTransaction($payable)
            ->setOperation()
            ->setCharges();

        if (static::$clearCache) {
            getModule((int)$payable->getFromModule())->updateCache($payable->getPayer());
            getModule((int)$payable->getToModule())->updateCache($payable->getPayee());
        }

        return [
            'message' => 'success',
            'next' => 'success',
            'transaction' => $transaction->transaction,
        ];
    }

    /**
     * @return mixed|WalletModuleInterface|ModuleBasicAbstract
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param mixed $wallet
     * @return BusinessWalletIndex
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * check whether transaction password is valid not
     *
     * @param Request $request
     * @param null $transactionPassword
     * @param PaymentServices $paymentServices
     * @return PaymentServices|bool
     */
    function checkTransactionPassword(Request $request, $transactionPassword = null, PaymentServices $paymentServices)
    {
        if ($paymentServices->isAuthorized()) return true;

        $transactionPassword = $request->input('transactionPass', $transactionPassword);
        /** @var ModuleServices $moduleServices */
        $moduleServices = app(ModuleServices::class);
        $moduleData = $moduleServices->callModule('Wallet-BusinessWallet')->getModuleData(true);

        if ($transactionPassword && Hash::check($transactionPassword, $moduleData->get('transaction_password')))
            return $paymentServices->setAuthorized(true);
    }

    /**
     * @param $amount
     * @return bool
     */
    function hasSufficientBalance($amount)
    {
        if ($amount > User::companyUser()->balance())
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
     * Extra validation logic should go here
     *
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    function verifyWallet(Request $request)
    {
        $walletBalance = loggedUser()->walletBalance();
        $cart = CartServer::cartTotal();

        if ($cart['total'] > $walletBalance)
            return [
                'status' => false,
                'message' => 'wallet balance is not sufficient!',
                'statusCode' => 422,
            ];

        if (Gate::denies('initTransaction')) {
            session(['paymentData' => $request->all()]);
            return [
                'status' => false,
                'statusCode' => 403,
                'message' => 'Invalid transaction pass'
            ];
        }

        return ['status' => true];
    }

    /**
     * @param array $args
     * @param TransactionServices $transactionServices
     * @return array
     */
    function processDeposit($args = [], TransactionServices $transactionServices)
    {
        /** @var TransactionServices $transaction */
        $transaction = $transactionServices->processTransaction($args['payable']);
        //Keep deposit record
        $transaction->transaction->operation()->create([
            'remarks' => $args['remarks'],
            'from_wallet' => $args['from_wallet'],
            'to_wallet' => $args['to_wallet'],
            'operation_id' => TransactionOperation::where('slug', 'deposit')->first()->id
        ]);

        return [
            'status' => 'success',
            'transaction' => $transaction->transaction
        ];
    }

    /**
     * @return mixed|ModuleServices
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     * @return BusinessWalletIndex
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }
}
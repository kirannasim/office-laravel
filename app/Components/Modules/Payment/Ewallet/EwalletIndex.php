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

namespace App\Components\Modules\Payment\Ewallet;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\Ewallet\ModuleCore\Traits\BootMethods;
use App\Components\Modules\Payment\Ewallet\ModuleCore\Traits\Hooks;
use App\Components\Modules\Payment\Ewallet\ModuleCore\Traits\Routes;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class EwalletIndex
 * @package App\Components\Modules\Payment\Ewallet
 */
class EwalletIndex extends PaymentModuleAbstract
{
    use Hooks, BootMethods, Routes;

    protected $service;

    protected $wallet;

    /**
     * @param ModuleServices $moduleServices
     */
    function initialize(ModuleServices $moduleServices)
    {
        $this->setService(app(PaymentServices::class))
            ->setWallet($moduleServices->callModule('Wallet-Ewallet'));
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

        return view('Payment.Ewallet.Views.payment', $data)->render();
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

        return [
            'message' => 'success',
            'next' => 'success',
            'transaction' => $transaction->transaction,
        ];
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
     * @return EwalletIndex
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
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
     * @return EwalletIndex
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }
}

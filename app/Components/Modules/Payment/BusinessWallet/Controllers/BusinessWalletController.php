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

namespace App\Components\Modules\Payment\BusinessWallet\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Payment\BusinessWallet\BusinessWalletIndex as Module;
use App\Components\Modules\Wallet\BusinessWallet\BusinessWalletIndex as Wallet;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Validations;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

/**
 * Class BusinessWalletController
 * @package App\Components\Modules\Wallet\BusinessWallet\Controllers
 */
class BusinessWalletController extends Controller
{
    use Validations;

    protected $module;

    protected $wallet;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();

        $this->setModule(app(Module::class))
            ->setWallet(app(Wallet::class));
    }

    /**
     * Set current wallet config values
     *
     * @return Collection
     */
    function walletConfig()
    {
        /** @var ModuleServices $moduleServices */
        $moduleServices = app(ModuleServices::class);

        return collect($moduleServices->getModuleData($this->module->moduleId));
    }

    /**
     * Transaction Pass
     *
     * @param Request $request
     * @param bool $verifyOnly
     * @param string $action
     * @param PaymentController $paymentController
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function transactionPass(Request $request, $verifyOnly = true, $action = 'handle', PaymentController $paymentController)
    {
        $verifyOnly = $request->input('verifyOnly', $verifyOnly);
        $action = $request->input('action', $action);

        if (Gate::denies('businesswalletTransaction'))
            return response()->json(['status' => false, 'error' => 'Incorrect transaction password'], 401);
        //If we only need to verify the transaction pass we
        //can safely return from here.
        if ($verifyOnly) return response()->json();

        $request->merge(session('paymentData', []));

        return app()->call([$paymentController, $action], ['request' => $request]);
    }

    /**
     * @param $amount
     * @return bool
     */
    function hasSufficientBalance($amount)
    {
        if ($this->getModule()->getBalance(User::companyUser(), false) >= $amount)
            return true;

        return false;
    }

    /**
     * @return ModuleBasicAbstract
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param mixed $module
     * @return $this
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param bool $verifyOnly
     * @param string $action
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getTransactionPassView($verifyOnly = false, $action = 'handle')
    {
        $data = ['verifyOnly' => $verifyOnly, 'action' => $action];

        return view('Payment.BusinessWallet.Views.Partials.transactionPass', $data);
    }

    /**
     * @return mixed
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param mixed $wallet
     * @return $this
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }
}

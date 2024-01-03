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

namespace App\Components\Modules\Payment\Freejoin;

use App\Blueprint\Interfaces\Module\PaymentModuleAbstract;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use App\Components\Modules\Payment\Freejoin\ModuleCore\Traits\Hooks;
use Illuminate\Contracts\View\View;

/**
 * Class FreejoinIndex
 * @package App\Components\Modules\Payment\Freejoin
 */
class FreejoinIndex extends PaymentModuleAbstract
{

    use Hooks;

    /**
     * Register providers
     */
    function providers()
    {

    }

    /**
     * handle admin settings
     */
    function adminConfig()
    {

    }

    /**
     * Payment page View
     *
     * @return View
     * @throws \Throwable
     */
    function renderView()
    {
        $styles = [];
        $styles[] = $this->addCss('style.css');
        $data['styles'] = $styles;
        $data['id'] = $this->moduleId;

        return view('Payment.Freejoin.Views.index', $data)->render();
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
        $payable->setFromModule($this->moduleId);
        // Adding transaction record with operation details
        $transaction = $transactionServices
            ->processTransaction($payable)
            ->setOperation()
            ->setCharges();

        return ['next' => 'success', 'orderStatus' => 1, 'transaction' => $transaction->transaction];
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
}

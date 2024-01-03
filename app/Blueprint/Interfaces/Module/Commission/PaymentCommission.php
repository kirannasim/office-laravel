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

namespace App\Blueprint\Interfaces\Module\Commission;

use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Support\Transaction\CommissionCallback;
use App\Eloquents\Commission;
use App\Eloquents\Transaction;
use App\Eloquents\User;


/**
 * Class PaymentCommission
 * @package App\Blueprint\Interfaces\Module\Commission
 */
class PaymentCommission implements CommissionType
{
    protected $benefit;

    protected $beneficiary;

    protected $gateway;

    /**
     * PaymentCommission constructor.
     * @param CommissionManager $commissionManager
     * @param null $beneficiary
     */
    function __construct(CommissionManager $commissionManager, $beneficiary = null)
    {
        $this->setBenefit($commissionManager)->setBeneficiary($beneficiary)->setGateway();
    }

    /**
     * @return mixed
     */
    function process()
    {
        /** @var PaymentServices $paymentService */
        $paymentService = app(PaymentServices::class);
        $transaction = $paymentService->clean()
            ->setAuthorized(true)
            ->setCallback(app(CommissionCallback::class))
            ->setPayable($this->preparePayable())
            ->setGateway($this->getGateway())
            ->processPayment();

        $this->addCommission($transaction['result']);

        return $transaction['result'];
    }

    /**
     * @return mixed
     */
    function preparePayable()
    {
        $attributes = [
            'payer' => User::companyUser(),
            'payee' => $this->getBeneficiary()['user'],
            'context' => 'commission',
            'actualAmount' => $actualAmount = $this->getBeneficiary()['benefit']['benefit'],
            'total' => $actualAmount - array_sum(array_column($charges = defineFilter('PreCommissionTransaction', [], 'transactionTotal', $actualAmount), 'amount')),
            'operation' => 'commission',
            'fromModule' => callModule('Wallet-BusinessWallet')->moduleId,
            'toModule' => $this->getBeneficiary()['benefit']['wallet'],
            'gateway' => $this->getGateway(),
            'charges' => $charges,
            'remarks' => array_key_exists('remark', $this->getBeneficiary()) ? $this->getBeneficiary()['remark'] : 'commission',
            'status' => in_array('credit_status', $this->getBeneficiary()) ? $this->getBeneficiary()['credit_status'] : 1
        ];

        return app(PaymentServices::class)->preparePayable($attributes);
    }

    /**
     * @return mixed
     */
    public function getBeneficiary()
    {
        return $this->beneficiary;
    }

    /**
     * @param mixed $beneficiary
     * @return PaymentCommission
     */
    public function setBeneficiary($beneficiary)
    {
        $this->beneficiary = $beneficiary;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @return PaymentCommission
     */
    public function setGateway()
    {
        $this->gateway = callModule('Payment-BusinessWallet');

        return $this;
    }

    /**
     * @param Transaction $transaction
     */
    function addCommission($transaction)
    {
        //save to commission history
        $attributes = [
            'transaction_id' => $transaction->id,
            'module_id' => $this->getBenefit()->getCommission()->moduleId,
            'ref_user_id' => $this->getBenefit()->getReferral() ? $this->getBenefit()->getReferral()->id : $this->getBeneficiary()['user']->id
        ];
        $commission = new Commission($attributes);

        $commission->save();
    }

    /**
     * @return CommissionManager
     */
    public function getBenefit()
    {
        return $this->benefit;
    }

    /**
     * @param mixed $benefit
     * @return PaymentCommission
     */
    public function setBenefit($benefit)
    {
        $this->benefit = $benefit;

        return $this;
    }
}
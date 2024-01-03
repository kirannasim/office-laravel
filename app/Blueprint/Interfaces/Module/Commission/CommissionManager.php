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

use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Eloquents\User;

/**
 * Interface CommissionBeneficiaryInterface
 * @package App\Blueprint\Interfaces\Module
 */
abstract class CommissionManager
{
    protected $beneficiaries = [];

    protected $referral;

    protected $commission;

    protected $commissionData;

    protected $commissionType;

    /**
     * CommissionManager constructor.
     *
     * @param User|null $referral
     * @param CommissionModuleInterface $commissionModule
     */
    function __construct(User $referral = null, CommissionModuleInterface $commissionModule)
    {
        $this->setCommission($commissionModule)
            ->setCommissionData()
            ->setReferral($referral);
    }

    /**
     * @return mixed
     */
    abstract function distribute();

    /**
     * @param bool $returnCollection
     * @return mixed
     */
    public function getCommissionData($returnCollection = false)
    {
        return $returnCollection ? collect($this->commissionData) : $this->commissionData;
    }

    /**
     * @return $this
     */
    public function setCommissionData()
    {
        $this->commissionData = $this->getCommission()->getModuleData();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaries()
    {
        return $this->beneficiaries;
    }

    /**
     * @param $beneficiaries
     * @return CommissionManager
     */
    abstract function setBeneficiaries($beneficiaries = null);

    /**
     * @return mixed
     */
    abstract function calculateBenefit();

    /**
     * @return User
     */
    public function getReferral()
    {
        return $this->referral;
    }

    /**
     * @param $referral
     * @return $this
     */
    public function setReferral($referral)
    {
        $this->referral = $referral;

        return $this;
    }

    /**
     * @return CommissionModuleInterface|ModuleBasicAbstract
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @param mixed $commission
     * @return CommissionManager
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @return CommissionType
     */
    public function getCommissionType()
    {
        return $this->commissionType;
    }

    /**
     * @param $commissionType
     * @param null $beneficiary
     * @return CommissionType
     */
    public function setCommissionType($commissionType, $beneficiary = null)
    {
        return $this->commissionType = new $commissionType($this, $beneficiary);
    }
}

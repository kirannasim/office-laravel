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

namespace App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Query\Builder;
use App\Eloquents\Package;
use App\Eloquents\User;
use App\Eloquents\UserRepo;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Support
 */
class Benefit extends CommissionManager
{
    protected $referenceData;

    /**
     * CommissionManager constructor.
     *
     * @param User|null $referral
     * @param CommissionModuleInterface $commissionModule
     */
    function __construct(User $referral, CommissionModuleInterface $commissionModule)
    {
        parent::__construct($referral, $commissionModule);
    }


    /**
     * @param mixed $beneficiaries
     * @return CommissionManager
     */
    function setBeneficiaries($beneficiaries = null)
    {
        $this->beneficiaries = $beneficiaries ?: $this->prepareBeneficiaries();

        return $this;
    }

    /**
     * @return array
     */
    function prepareBeneficiaries()
    {
        $data = [];
        $beneficiary = $this->getReferral()->sponsor();
        if ($this->getReferenceData()['scope'] == 'upgrade' && ($this->getReferral()->package->slug == 'founder' || $this->getReferral()->package->slug == 'one_year_founder')) {
            $founderPackageId = Package::where('slug', 'founder')->first()->id;
            $oneYearFounderPackageId = Package::where('slug', 'one_year_founder')->first()->id;
            $user = UserRepo::getAncestorsOf($this->getReferral()->id, 'sponsor', null, true)->whereHas('user', function ($query) use ($oneYearFounderPackageId, $founderPackageId) {
                /** @var Builder $query */
                $query->whereIn('package_id', [$founderPackageId, $oneYearFounderPackageId]);
            })->limit(1)
                ->get()
                ->first();
            $beneficiary = $user ? User::find($user->user_id) : null;
        }

        $benefit = $this->calculateBenefit();
        if ($beneficiary && $benefit['benefit'] > 0 && checkAccess($beneficiary->id, 'commission'))
            $data[] = [
                'user' => $beneficiary,
                'benefit' => $benefit,
                'credit_status' => 0
            ];

        return $data;
    }

    /**
     * @return mixed
     */
    public function getReferenceData()
    {
        return $this->referenceData;
    }

    /**
     * @param mixed $referenceData
     * @return Benefit
     */
    public function setReferenceData($referenceData)
    {
        $this->referenceData = $referenceData;

        return $this;
    }

    /**
     * @param array $data
     * @return array
     */
    function calculateBenefit($data = [])
    {
        $config = $this->getCommissionData(true);
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$config->get('wallet'));
        $package = $this->getReferenceData()['scope'] == 'upgrade' ? $this->getReferenceData()['previousPackage'] : $this->getReferral()->package;
        $amount = $package ? $config->get($this->getReferenceData()['scope'])[$package->id] : 0;

        return [
            'commissionType' => PaymentCommission::class,
            'wallet' => $wallet->moduleId,
            'benefit' => $amount,
        ];
    }

    /**
     * @return mixed
     */
    function distribute()
    {
        foreach ($this->getBeneficiaries() as $beneficiary)
            $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
    }
}
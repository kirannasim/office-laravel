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

namespace App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Support
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
        $plugins = app(Plugins::class);
        $config = $this->getCommissionData(true);
        /** @var Collection $uplineUsers */
        $uplineUsers = UserRepo::getAncestorsOf($this->getReferral()->id, 'sponsor', count($config->get('commission')));
        $data = [];

        $uplineUsers->each(function ($value, $key) use ($plugins, $config, &$data) {
            $beneficiary = User::find($value->user_id);
            if ($this->isLevelQualified($beneficiary, $key + 1, $config)) {
                $benefit = $this->calculateBenefit(['beneficiary' => $beneficiary, 'level' => $key, 'config' => $config]);
                if ($benefit['benefit'] && checkAccess($beneficiary->id, 'commission') && !$plugins->isAffiliate($beneficiary))
                    $data[] = [
                        'user' => $beneficiary,
                        'benefit' => $benefit,
                        'credit_status' => 0
                    ];
            }
        });

        return $data;
    }

    /**
     * @param User $user
     * @param $level
     * @param $config
     * @return bool
     */
    function isLevelQualified(User $user, $level, $config)
    {
        $plugins = app(Plugins::class);
        $requiredRank = $config->get('required_rank')['level_' . $level];
        if ($requiredRank == null) return true;

        if ($requiredRank == 1 && !$plugins->isAffiliate($user)) return true;

        if ($user->rank && $user->rank->rank_id >= $requiredRank)
            return true;

        return false;
    }

    /**
     * @param array $data
     * @return array
     */
    function calculateBenefit($data = [])
    {
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$data['config']->get('wallet'));
        $levelPercent = $data['config']->get('commission')['level_' . ($data['level'] + 1)];
        //level % added 2% extra for founders // later modification on 07/Nov/2019
        $founderPakcks = [3, 5];
        if (in_array($data['beneficiary']->package_id, $founderPakcks))
            $levelPercent = $levelPercent + 2;

        $amount = ($this->getReferenceData()['amount'] * $levelPercent) / 100;

        return [
            'commissionType' => PaymentCommission::class,
            'wallet' => $wallet->moduleId,
            'benefit' => $amount
        ];
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
     * @return mixed
     */
    function distribute()
    {
        foreach ($this->getBeneficiaries() as $beneficiary)
            $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
    }
}

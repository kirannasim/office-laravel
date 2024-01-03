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

namespace App\Components\Modules\Commission\DiamondBonusPool\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\OrderProduct;
use Carbon\Carbon;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\DiamondBonusPool\ModuleCore\Support
 */
class Benefit extends CommissionManager
{
    protected $referenceData;

    /**
     * CommissionManager constructor.
     *
     * @param CommissionModuleInterface $commissionModule
     */
    function __construct(CommissionModuleInterface $commissionModule)
    {
        parent::__construct(null, $commissionModule);
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
        $plugins = app(Plugins::class);
        $config = $this->getCommissionData(true);
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$config->get('wallet'));
        /** @var Plugins $plugins */
        $fromDate = Carbon::now()->subMonth(3)->format('Y-m-d H:i:s');
        $toDate = Carbon::now()->format('Y-m-d H:i:s');
        $globalSalePv = OrderProduct::whereBetween('created_at', [$fromDate, $toDate])->sum('pv');
        AdvancedRank::get()->each(function ($rank) use ($plugins, $wallet, $globalSalePv, $config, &$data) {
            $rankRatio = $config->get('pool_share')[$rank->id] / 100;
            if ($rankRatio <= 0) return;

            $rankUsers = AdvancedRankUser::where('rank_id', $rank->id)->get();
            if (!$rankUsers->count()) return;

            $totalAllocatedCv = $globalSalePv * $rankRatio;
            $rankUserBenefit = $totalAllocatedCv / $rankUsers->count();
            $rankUsers->each(function ($rankUser) use ($plugins, $rankUserBenefit, $wallet, &$data) {
                $beneficiary = $rankUser->user;
                if ($rankUserBenefit > 0 && checkAccess($rankUser->user_id, 'commission') && !$plugins->isAffiliate($beneficiary))
                    $data[] = [
                        'user' => $beneficiary,
                        'benefit' => [
                            'commissionType' => PaymentCommission::class,
                            'wallet' => $wallet->getRegistry()['moduleId'],
                            'benefit' => round($rankUserBenefit, 3)
                        ],
                        'credit_status' => 1
                    ];
            });
        });

        return $data;
    }

    /**
     * @param array $data
     * @return array
     */
    function calculateBenefit($data = [])
    {

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

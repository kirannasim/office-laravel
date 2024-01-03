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

namespace App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\Commission\DailyProfit\ModuleCore\Eloquents\PlanCycle;
use App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool;
use App\Components\Modules\General\CommissionManager\ModuleCore\Services\CommissionManagerServices;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\BinaryRank\ModuleCore\Eloquents\BinaryRankUser;
use App\Components\Modules\System\MLM\ModuleCore\Eloquents\PlanCycleDetail;
use Illuminate\Support\Facades\DB;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Support
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
        $fromDate = StarPfcPool::where('is_distributed', false)->orderBy('created_at', 'asc')->first()->created_at;

        return AdvancedRankAchievementHistory::with('user')->whereDate('created_at', '<', $fromDate)->where('rank_id', '>=', 6)->groupBy('user_id')->get();
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
     * @throws \Throwable
     */
    function distribute()
    {
        if (!($beneficiaryCount = $this->getBeneficiaries()->count())) return;

        $config = $this->getCommissionData(true);
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$config->get('wallet'));
        $totalShare = StarPfcPool::where('is_distributed', false)->sum('amount');
        $benefit = $totalShare / $beneficiaryCount;

        DB::transaction(function () use ($benefit, $wallet, $config) {
            foreach ($this->getBeneficiaries() as $rankHolder) {
                $beneficiary = [
                    'user' => $rankHolder->user,
                    'benefit' => [
                        'commissionType' => PaymentCommission::class,
                        'wallet' => $wallet->getRegistry()['moduleId'],
                        'benefit' => $benefit
                    ],
                    'credit_status' => 1
                ];

                $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
            }

            StarPfcPool::where('is_distributed', false)->update(['is_distributed' => true]);
        });
    }
}
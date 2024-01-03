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

namespace App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentRoi;
use App\Components\Modules\Commission\StarPFCPoolBonus\ModuleCore\Eloquents\StarPfcPool;
use App\Components\Modules\Payment\BusinessWallet\BusinessWalletIndex;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\UserRepo;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Support
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
        return InvestmentRoi::with('client')->whereDate('created_at', '<', Carbon::now()->subDay(30))->get();
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
        if (!$this->getBeneficiaries()->count()) return;

        BusinessWalletIndex::$clearCache = false;
        $config = $this->getCommissionData(true);
        $plugins = app(Plugins::class);

        DB::transaction(function () use ($plugins, $config) {
            foreach ($this->getBeneficiaries() as $roi) {
                $sponsorId = $roi->client->sponsor_id;
                /** @var Collection $uplineUsers */
                $uplineUsers = UserRepo::getAncestorsOf($sponsorId, 'sponsor', count($config->get('commission')));
                $uplineUsers->prepend(UserRepo::where('user_id', $sponsorId)->first());
                $uplineUsers->each(function ($repo, $key) use ($plugins, $config, $roi, &$data) {
                    $beneficiary = [
                        'user' => $user = $repo->user,
                        'benefit' => $benefit = $this->calculateBenefit(['beneficiary' => $user, 'level' => $key, 'profit' => $roi->profit, 'config' => $config]),
                        'remark' => "Investment ID : $roi->id",
                        'credit_status' => 1
                    ];

                    /** @var Plugins $plugins */
                    if (!(double)$benefit['benefit'] || !checkAccess($user->id, 'commission') || $plugins->isAffiliate($user)) return;

                    $transaction = $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
                    if ($transaction) {
                        $distributionAmount = ($roi->profit * $config->get('percentage')) / 100;
                        $starSharePool = ($distributionAmount * $config->get('star_pool_share')) / 100;
                        StarPfcPool::create([
                            'amount' => $starSharePool,
                            'investment_id' => $roi->id,
                            'is_distributed' => false,
                        ]);
                    }
                });
            }
        });
    }

    /**
     * @param array $data
     * @return array
     */
    function calculateBenefit($data = [])
    {
        $config = $data['config'];
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$config->get('wallet'));
        $distributionAmount = ($data['profit'] * $config->get('percentage')) / 100;
        $amount = ($distributionAmount * $config->get('commission')['level_' . ($data['level'] + 1)]) / 100;

        return [
            'commissionType' => PaymentCommission::class,
            'wallet' => $wallet->moduleId,
            'benefit' => $amount
        ];
    }
}
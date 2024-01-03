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

namespace App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Support;

use App\Blueprint\Interfaces\Module\Commission\CommissionManager;
use App\Blueprint\Interfaces\Module\Commission\PaymentCommission;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class Benefit
 * @package App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Support
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
        /** @var Collection $uplineUsers */
        $uplineUsers = app(BinaryServices::class)->getAncestorsOf($this->getReferral());
        $data = [];
        $config = $this->getCommissionData(true);
        $uplineUsers->each(function ($value) use ($plugins, $config, &$data) {
            $beneficiary = User::find($value->user_id);
            $benefit = $this->calculateBenefit(['beneficiary' => $beneficiary, 'userData' => $value, 'config' => $config]);
            if ($benefit['benefit'] && $this->isReferralRuleQualified($beneficiary, $config) && !$plugins->isAffiliate($beneficiary))
                $data[] = [
                    'user' => $beneficiary = User::find($value->user_id),
                    'benefit' => $benefit,
                    'credit_status' => 0
                ];
        });


        return $data;
    }

    /**
     * @param array $data
     * @return array
     */
    function calculateBenefit($data = [])
    {
        /** @var BinaryServices $binaryServices */
        $binaryServices = app(BinaryServices::class);
        $plugins = app(Plugins::class);
        /** @var ModuleBasicAbstract|WalletModuleInterface $wallet */
        $wallet = callModule((int)$data['config']->get('wallet'));

        $possiblePair = $pair = $this->getPossiblePair($data, $data['config']);

        $userRank = 0;

        if ($data['beneficiary']->rank)
            $userRank = $data['beneficiary']->rank->rank_id;
        elseif (!$plugins->isAffiliate($data['beneficiary']))
            $userRank = 1;
        //Pair cieling based on rank later modified
        $ceilingRate = $userRank ? $data['config']->get('ceiling_rate')[$userRank] : 0;

        if (!$possiblePair) {
            return [
                'commissionType' => PaymentCommission::class,
                'wallet' => $wallet->moduleId,
                'benefit' => 0
            ];
        }


        //Pair price 2% added for founders // later modification on 07/Nov/2019
        $pairPrice = $data['config']->get('pair_price');
        $founderPakcks = [3, 5];
        if (in_array($data['beneficiary']->package_id, $founderPakcks))
            $pairPrice = $pairPrice + 2;
        if ($data['config']->get('distribution_type') == 'percent') {
            $totalPairValue = $possiblePair * $data['config']->get('pair_value');
            $amount = ($totalPairValue * $pairPrice) / 100;
        } else {
            $amount = $possiblePair * $pairPrice;
        }

        if (($pairCeilingType = $data['config']->get('pair_ceiling_type')) != 'none') {
            switch ($pairCeilingType) {
                case 'monthly':
                    $fromDate = Carbon::now()->startOfMonth();
                    $toDate = Carbon::now()->format('Y-m-d 23:59:59');
                    break;
                case 'weekly':
                    $weekDay = $data['config']->get('week_day');
                    //need a cheking monday or not
                    $fromDate = ($weekDay != Carbon::now()->format('I')) ? Carbon::createFromTimeStamp(strtotime("last $weekDay", Carbon::now()->timestamp)) : Carbon::now()->format('Y-m-d') . ' 00:00:00';
                    $toDate = Carbon::now()->format('Y-m-d 23:59:59');
                    break;
                case 'daily':
                    $fromDate = Carbon::now()->format('Y-m-d') . ' 00:00:00';
                    $toDate = Carbon::now()->format('Y-m-d 23:59:59');
                    break;
            }

            $pairCount = $binaryServices->getPairCount(['user' => $data['beneficiary']->id, 'fromDate' => $fromDate, 'toDate' => $toDate]);
            $totalPossiblePair = $pairCount + $possiblePair;

            if ($data['config']->get('pair_ceiling_based') == 'pair_count') {
                if ($pairCount >= $ceilingRate) {
                    $pair = 0;
                } elseif ($totalPossiblePair > $ceilingRate) {
                    $pair = $ceilingRate - $pairCount;
                } else {
                    $pair = $possiblePair;
                }

                if ($data['config']->get('distribution_type') == 'percent') {
                    $totalPairValue = $pair * $data['config']->get('pair_value');
                    $amount = ($totalPairValue * $pairPrice) / 100;
                } else {
                    $amount = $pair * $pairPrice;
                }
            } elseif ($data['config']->get('pair_ceiling_based') == 'amount') {
                $options = collect([
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                    'user' => User::find($data['beneficiary'])
                ]);

                $pairAmount = callModule('Commission-TeamVolumeCommission')->credited($data['beneficiary'], $options)->sum('amount');

                $possibleAmount = $data['config']->get('distribution_type') == 'percent' ? ($possiblePair * $pairPrice) / 100 : $possiblePair * $pairPrice;
                $totalPossibleAmount = $pairAmount + $possibleAmount;

                if ($pairAmount >= $ceilingRate)
                    $amount = 0;
                elseif ($totalPossibleAmount > $ceilingRate) {
                    $amount = $ceilingRate - $pairAmount;
                } else {
                    $amount = $possibleAmount;
                }
            }
        }

        $pairId = BinaryPoint::max('pair_id') + 1;
        $binaryServices->deductPoints($data['beneficiary'], $possiblePair * $data['config']->get('pair_value'), 1, $pair, $possiblePair, $pairId);
        $binaryServices->deductPoints($data['beneficiary'], $possiblePair * $data['config']->get('pair_value'), 2, $pair, $possiblePair, $pairId);

        return [
            'commissionType' => PaymentCommission::class,
            'wallet' => $wallet->moduleId,
            'benefit' => $amount
        ];
    }

    /**
     * @param $data
     * @param $config
     * @return float|int|mixed
     */
    public function getPossiblePair($data, $config)
    {
        $possiblePair = 0;
        /** @var BinaryServices $binaryServices */
        $binaryServices = app(BinaryServices::class);
        $points = $binaryServices->getPoints(collect([
            'userId' => $data['beneficiary']->id,
            'fullStats' => true
        ]))->first();

        $leftPoint = $points['leftCarry'];
        $rightPoint = $points['rightCarry'];

        if (min($leftPoint, $rightPoint) < $config->get('pair_value')) return 0;

        $possiblePair = min($leftPoint, $rightPoint) / $config->get('pair_value');

        return (int)$possiblePair;
    }

    /**
     * @param User $user
     * @param $config
     * @return bool
     */
    function isReferralRuleQualified(User $user, $config)
    {
        if (!$config->get('direct_referral_rule')) return true;

        $leftReferrals = UserRepo::find($user->id)->leftReferrals(true)->count();

        $rightReferrals = UserRepo::find($user->id)->rightReferrals(true)->count();

        if ($leftReferrals >= (int)$config->get('required_left_referral') && $rightReferrals >= (int)$config->get('required_right_referral')) return true;

        return false;
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
        DB::transaction(function () {
            $data = [];
            foreach ($this->getBeneficiaries() as $beneficiary) {
                $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
                callmodule('Commission-GenerationMatchingBonus', 'process', ['data' => ['user' => $beneficiary['user'], 'amount' => $beneficiary['benefit']['benefit']]]);
                /* $founderPakcks = [3, 5];
                  if (in_array($beneficiary['user']->package_id, $founderPakcks))
                     array_push($data, ['user' => $beneficiary['user'], 'amount' => $beneficiary['benefit']['benefit']]);*/
            }
            /*if(count($data) > 0)
            {
                callmodule('Commission-PFCCommission', 'process', ['data' => $data]);
            }*/
        });
    }

    function distributeMissedCommission($pairs)
    {
        DB::transaction(function () use ($pairs) {
            $data = [];
            $pairs->each(function ($pair) use (&$data) {
                $pairPrice = 10;
                $founderPakcks = [3, 5];
                if (in_array($pair->user->package_id, $founderPakcks))
                    $pairPrice = $pairPrice + 2;
                $beneficiary = [
                    'user' => $pair->user,
                    'benefit' => [
                        'commissionType' => PaymentCommission::class,
                        'wallet' => getModule('Wallet-Ewallet')->moduleId,
                        'benefit' => (($pair->possible_pair * 200) * $pairPrice) / 100
                    ],
                    'credit_status' => 0
                ];

                $this->setCommissionType($beneficiary['benefit']['commissionType'], $beneficiary)->process();
                callmodule('Commission-GenerationMatchingBonus', 'process', ['data' => ['user' => $beneficiary['user'], 'amount' => $beneficiary['benefit']['benefit']]]);
            });
        });
    }
}
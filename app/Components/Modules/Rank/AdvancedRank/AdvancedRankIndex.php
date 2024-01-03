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

namespace App\Components\Modules\Rank\AdvancedRank;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\RankModuleInterface;
use App\Blueprint\Services\CommissionServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits\Hooks;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits\Routes;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits\Validations;
use App\Eloquents\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Throwable;


/**
 * Class AdvancedRankIndex
 * @package App\Components\Modules\Rank\AdvancedRank
 */
class AdvancedRankIndex extends BasicContract implements RankModuleInterface
{
    use Routes, Hooks, Validations;

    protected $referenceData;

    /**
     * @inheritdoc
     */
    function bootMethods(CommissionServices $commissionServices)
    {
        $this->service = $commissionServices;

        schedule('Rank Calculation', function () {
            $this->process();
        });
    }

    /**
     * @return mixed|void
     */
    function process()
    {
        $userServices = app(UserServices::class);
        /** @var UserServices $userServices */
        $users = $userServices->getUsers(collect([]), null, true, ['repoData', 'metaData', 'rank', 'investmentClients'])->get();
        $users->each(function ($user) {
            $rank = $this->calculate($user);
            if ($rank) $this->distribute($user, $rank);
        });

    }

    /**
     * @param User $user
     * @return Model|mixed|null|static
     */
    function calculate(User $user)
    {
        //return $this->isQualified(AdvancedRank::find(2), $user);
        return AdvancedRank::orderBy('id', 'desc')->get()->filter(function ($rank) use ($user) {
            return $this->isQualified($rank, $user);
        })->first();
    }

    /**
     * @param AdvancedRank $rank
     * @param User $user
     * @return bool
     */
    function isQualified(AdvancedRank $rank, User $user)
    {
        $checkChildren = function () use ($user, $rank) {
            $ranksToCheck = [
                [
                    'rank' => $rank->referral_rank,
                    'count' => $rank->referral_rank_count,
                    'minCount' => $rank->minimum_leg_count,
                ],
                [
                    'rank' => $rank->second_referral_rank,
                    'count' => $rank->second_referral_rank_count,
                    'minCount' => $rank->second_referral_min_count,
                ],
            ];
            $checkMaintenance = $rank->need_active_referrals ? true : false;

            foreach ($ranksToCheck as $eachRank) {
                if (!$eachRank['rank'] || !$eachRank['count']) return true;

                if (!$user->repoData) return false;
                /** @var Collection $children */
                $children = $user->repoData->applySponsorHierarchy()->children()->get()->filter(function ($child) use ($eachRank, $checkMaintenance, $rank) {
                    /** @var User $child */
                    return ($child->rank && ($child->rank->rank_id >= $eachRank['rank']) && ($checkMaintenance ? $child->user->expiry_date >= Carbon::now() : true));
                });

                if ($children->count() < $eachRank['count']) return false;

                if ($children->count() && ($minLegs = $eachRank['minCount'])) {
                    $leftReferrals = $user->repoData->leftReferrals(true)->whereIn('user_id', [$children->pluck('user_id')])->count();
                    $rightReferrals = $user->repoData->rightReferrals(true)->whereIn('user_id', [$children->pluck('user_id')])->count();

                    if (($leftReferrals >= $minLegs) && ($rightReferrals >= $minLegs)) return true;
                }
            }

            return true;
        };
        if (null !== $user->expiry_date && $user->expiry_date < Carbon::now()) return false;

        if(!$user->repoData) return false;

        if($user->package && ($user->package->slug == 'affiliate' || $user->package->slug == 'influencer')) return false;

        if (!$checkChildren()) return false;

        if ($rank->investment_clients && ($user->investmentClients->count() < $rank->investment_clients)) return false;

        if ($rank->sponsor_line) {
            /** @var Collection $sponsoredChildren */
            $sponsoredChildren = $user->repoData->applySponsorHierarchy()->children()->get();

            if ($sponsoredChildren->filter(function ($line) use ($rank) {
                    /** @var UserRepo $line */
                    return $line->descendantsQuery('sponsor', true)->get()->filter(function ($child) use ($rank) {
                        /** @var User $child */
                        return ($child->rank && ($child->rank->rank_id >= $rank->sponsor_line_rank));
                    });
                })->count() < $rank->sponsor_line) return false;
        }

        $isCycleCompleted = function ($cycle) use ($rank, $user) {
            /** @var BinaryServices $binaryServices */
            $binaryServices = app(BinaryServices::class);
            $fromDate = $cycle == 'accumulated_cycle_preceding' ? $user->created_at->format('Y-m-d H:i:s') : Carbon::now()->startOfMonth();
            $toDate = Carbon::now()->format('Y-m-d H:i:s');

            return $binaryServices->getPairCount(['user' => $user->id, 'fromDate' => $fromDate, 'toDate' => $toDate]) >= $rank->{$cycle};
        };

        if ($rank->accumulated_cycle) {
            if (!$isCycleCompleted('accumulated_cycle')) return false;
        }

        if ($rank->accumulated_cycle_preceding) {
            if (!$isCycleCompleted('accumulated_cycle_preceding')) return false;
        }

        return true;
    }

    /**
     * @param User $user
     * @param $rank
     * @return mixed|void
     */
    function distribute(User $user, $rank)
    {
        $existingRank = AdvancedRankUser::where('user_id', $user->id)->first();
        if (!$existingRank || ($rank->id != $existingRank->rank_id)) {
            if ($existingRank)
                AdvancedRankUser::where('user_id', $user->id)->update([
                    'rank_id' => $rank->id
                ]);
            else
                AdvancedRankUser::create([
                    'user_id' => $user->id,
                    'rank_id' => $rank->id
                ]);

            AdvancedRankAchievementHistory::create([
                'user_id' => $user->id,
                'rank_id' => $rank->id
            ]);
        }
    }

    /**
     * handle module installations
     *
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module un-installation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $data = [];

        //return view('Rank.AdvancedRank.Views.adminConfig', $data);
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
     * @return AdvancedRankIndex
     */
    public function setReferenceData($referenceData)
    {
        $this->referenceData = $referenceData;

        return $this;
    }

    /**
     * @param $content
     * @return string
     */
    public function getPersonalizedSettingsMenu($content)
    {
        return $content .= '<div class="nav active" data-target="advancedRank">
                <i class="fa fa-cog"></i>Set Advanced Rank
            </div>';
    }

    /**
     * @return string
     * @throws Throwable
     */
    public function getPersonalizedSettingsContent($user)
    {
        $data['ranks'] = AdvancedRank::get();
        $existingRank = AdvancedRankUser::with('rank')->where('user_id', $user)->first();
        $data['existingRank'] = $existingRank && !empty($existingRank->rank) ? $existingRank->rank->name : '';
        $data['userId'] = $user;

        return view('Rank.AdvancedRank.Views.personalizedSettingsContent', $data);
    }


    function userRankCheck()
    {
        $username = 'Adam103';
        $rank = $this->calculate(getUser($username));
        dd($rank);
        //if ($rank) $this->distribute($user, $rank);
    }
}

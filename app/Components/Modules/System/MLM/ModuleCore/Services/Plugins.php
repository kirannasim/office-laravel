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

namespace App\Components\Modules\System\MLM\ModuleCore\Services;

use App\Components\Modules\System\MLM\ModuleCore\Eloquents\PendingDistributionList;
use App\Eloquents\User;

/**
 * Class Plugins
 * @package App\Components\Modules\MLMPlan\Binary\ModuleCore\Services
 */
class Plugins
{
    /**
     * @param User $user
     * @return bool
     */
    function isAffiliate(User $user)
    {
        return ($user->package && $user->package->slug != 'affiliate') ? false : true;
    }

    /**
     * @param User $user
     * @return bool
     */
    function isInfluencer(User $user)
    {
        return $user->package->slug == 'influencer' ? true : false;
    }

    /**
     * @param User $user
     * @return bool
     */
    function isIBRankUser(User $user)
    {
        return $user->package->slug == 'influencer' ? true : false;
    }

    /**
     * @param $userId
     * @param $scope
     * @param $previousPackage
     * @param int $amount
     * @return
     */
    function insertToPending($userId, $scope, $previousPackage, $amount = 0)
    {

        return PendingDistributionList::create([
            'user_id' => $userId,
            'scope' => $scope,
            'previous_package' => $previousPackage,
            'amount' => $amount,
            'status' => false
        ]);
    }
}


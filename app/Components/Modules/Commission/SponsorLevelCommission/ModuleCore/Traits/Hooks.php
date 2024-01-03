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

namespace App\Components\Modules\Commission\SponsorLevelCommission\ModuleCore\Traits;

use App\Components\Modules\System\MLM\ModuleCore\Eloquents\PendingDistributionList;
use App\Eloquents\Package;
use App\Eloquents\User;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\SponsorLevelCommission\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers hooks
     *
     */
    function hooks()
    {
        registerAction('postRegistration', function ($data) {
            if ($data->get('result')['user']->repoData && $data->get('result')['user']->package->slug != 'affiliate') {
                return $this->process([
                    'user' => $data->get('result')['user'],
                    'amount' => getPackageInfo($data->get('result')['user']->package_id)['price'],
                    'scope' => 'registration',
                ]);
            }
        }, 'registration', 0);

        registerAction('postPackageUpgrade', function ($data) {
            if ($data->get('result')['user']->repoData && $data->get('result')['user']->package->slug != 'affiliate') {
                return $this->process([
                    'user' => User::find($data->get('result')['transaction']['payer']),
                    'scope' => 'upgrade',
                    /*'amount' => getPackageInfo($data->get('previousPackage'))->price,*/
                ]);
            }
        }, 'package_upgrade', 0);

        registerAction('postAddToRepo', function ($data) {
            $user = $data['user'];
            if($user->package->slug != 'affiliate')
            {
                PendingDistributionList::where('user_id', $user->id)
                    ->where('status', false)
                    ->where('scope', 'registration')
                    ->get()->each(function ($entry) {
                        $this->process([
                            'user' => $entry->user,
                            'amount' => $entry->amount,
                            'scope' => 'registration',
                        ]);
                    });


                PendingDistributionList::where('user_id', $user->id)
                    ->where('status', false)
                    ->where('scope', 'upgrade')
                    ->get()->each(function ($entry) {
                        $this->process([
                            'user' => $entry->user,
                            'scope' => 'upgrade',
                        ]);
                    });    
            }
            
        }, 'holdingTank', 0);
    }
}
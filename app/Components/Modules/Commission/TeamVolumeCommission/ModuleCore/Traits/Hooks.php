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

namespace App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Traits;

use App\Components\Modules\System\MLM\ModuleCore\Eloquents\PendingDistributionList;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Traits
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
           return $this->process($data->get('result'));
        }, 'registration', 4);

        registerAction('postAddToRepo', function ($data) {
            $user = $data['user'];
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
        }, 'holdingTank', 4);
    }
}
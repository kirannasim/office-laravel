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

/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 1/11/2018
 * Time: 12:06 AM
 */

namespace App\Components\Modules\General\AccountStatus\ModuleCore\Services;

use App\Eloquents\UserPermission;


/**
 * Class AccountStatusServices
 * @package App\Components\Modules\General\AccountStatus\ModuleCore\Services
 */
class AccountStatusServices
{

    function getAccountStatusForUser($user_id)
    {
        $returnArray = ['login' => 1, 'commission' => 1, 'payout' => 1, 'fund_transfer' => 1, 'title' => 'active'];

        if (UserPermission::where('user_id', $user_id)->get()) {
            $permissions = UserPermission::where('user_id', $user_id)->get(['status', 'slug', 'title']);
            foreach ($permissions as $permission) {
                $returnArray[$permission->slug] = $permission->status;
                $returnArray['title'] = $permission->title;
            }

        }

        return $returnArray;
    }

}

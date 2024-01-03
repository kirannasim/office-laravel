<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Xoom\Service;

use App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class XoomService
{
    /**
     * @param XoomUser|null $xoomUser
     * @param Request $request
     * @param User $user
     * @param UserMeta $userMeta
     * @param Collection $moduleData
     * @return XoomUser
     */
    public static function connect(?XoomUser $xoomUser, Request $request, User $user, UserMeta $userMeta, Collection $moduleData): XoomUser
    {
        // create xoom_users if not exists
        if (!$xoomUser) {
            $xoomUser = new XoomUser();
            $xoomUser->user_id = $user->id;
            $xoomUser->save();
        }

        // check if email exists in AB
        $userExists = ABAPI::checkIfUserExistsByEmail($user->email, ABAPI::getApplicationAccessToken($moduleData)->access_token);

        if (!$userExists && $xoomUser->xoom_user_id) {
            $userExists = ABAPI::checkIfUserExistsByUserId($xoomUser->xoom_user_id, ABAPI::getApplicationAccessToken($moduleData)->access_token);
        }

        if ($userExists) {
            // update account
            ABAPI::updateAccount($user, $xoomUser, $moduleData);

            $xoomUser->xoom_user_id = $userExists[0]['id'] ?? $userExists['id'];
            // get cx AT
            $userAccessToken = ABAPI::getUserAccessToken($user->email, $xoomUser->generateXoomPassword(), $moduleData);
        } else {
            $createAccount = ABAPI::createAccount(
                $user,
                $userMeta,
                $xoomUser,
                $request,
                $moduleData
            );

            $userAccessToken = ABAPI::getUserAccessToken($createAccount['email'], $xoomUser->generateXoomPassword(), $moduleData);

            $xoomUser->xoom_user_id = $createAccount['id'];
        }

        $xoomUser->access_token = $userAccessToken;
        $xoomUser->save();

        return $xoomUser;
    }

    /**
     * @param XoomUser $xoomUser
     * @param Collection $moduleData
     * @param User $user
     * @return XoomUser
     */
    public static function authorizeUser(XoomUser $xoomUser, Collection $moduleData, User $user): XoomUser
    {
        $userExists = ABAPI::checkIfUserExistsByUserId($xoomUser->xoom_user_id, ABAPI::getApplicationAccessToken($moduleData)->access_token);

        if ($userExists) {
            // update user
            ABAPI::updateAccount($user, $xoomUser, $moduleData);

            // get cx AT
            $userAccessToken = ABAPI::getUserAccessToken($user->email, $xoomUser->generateXoomPassword(), $moduleData);

            $xoomUser->access_token = $userAccessToken;
            $xoomUser->save();
        }

        return $xoomUser;
    }
}


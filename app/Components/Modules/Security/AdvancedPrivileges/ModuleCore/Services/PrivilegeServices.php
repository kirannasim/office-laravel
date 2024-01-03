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
 * User: Hybrid MLM
 * Date: 1/11/2018
 * Time: 12:06 AM
 */

namespace App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Services;

use App\Eloquents\UserSubType;
use App\Eloquents\UserType;
use Illuminate\Support\Collection;


/**
 * Class PrivilegeServices
 * @package App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Services
 */
class PrivilegeServices
{
    protected $whiteListable = ['menus', 'modules', 'themes'];

    /**
     * @param $itemType
     * @param $item
     * @param $userType
     * @param null $userSubType
     * @param string $action
     * @return bool
     */
    function updatePrivilege($itemType, $item, $userType, $userSubType = null, $action = 'whitelist')
    {
        if (((int)$userType !== 0) && !in_array($userType, array_column(UserType::all()->toArray(), 'id')))
            return false;
        //adding to privileges shortlist
        foreach (UserType::all() as $mainUserType) {
            if ($userType && ($mainUserType->id != $userType)) continue;

            /** @var UserType $mainUserType */
            $shortListedPrivileges = $mainUserType->privilege;
            $mainUserType->privilege = $this->{$action}($shortListedPrivileges, $itemType, $item);
            $mainUserType->save();
            //Assigning to sub-user-types
            foreach ($mainUserType->subTypes as $subType) {
                if ($userSubType && ($subType->id != $userSubType))
                    continue;

                $assignedPrivileges = $subType->privilege;
                $subType->privilege = $this->{$action}($assignedPrivileges, $itemType, $item);
                $subType->save();
            }
        }

        return true;
    }

    /**
     * @param array $privileges
     * @param $type
     * @param $item
     * @return array
     */
    function whitelist($privileges = [], $type, $item)
    {
        $specificPrivileges = isset($privileges[$type]) ? array_unique($privileges[$type]) : [];

        if (!in_array($item, array_values($specificPrivileges))) $specificPrivileges[] = $item;

        $privileges[$type] = $specificPrivileges;

        return $privileges;
    }

    /**
     * @param array $privileges
     * @param $type
     * @param $item
     * @return array
     */
    function blacklist($privileges = [], $type, $item)
    {
        $specificPrivileges = array_unique($privileges[$type]);

        if (in_array($item, array_values($specificPrivileges)))
            unset($specificPrivileges[array_search($item, $specificPrivileges)]);

        $privileges[$type] = $specificPrivileges;

        return $privileges;
    }

    /**
     * @param $type
     * @param $item
     */
    function flushPrivilegedItem($type, $item)
    {
        $this->flushInGroups(UserType::all(), $type, $item);
        $this->flushInGroups(UserSubType::all(), $type, $item);
    }

    /**
     * @param $types
     * @param $type
     * @param $item
     */
    function flushInGroups($types, $type, $item)
    {
        /** @var Collection $types */
        foreach ($types as $userType) {
            $privileges = $userType->privilege;

            if (isset($privileges[$type]) && in_array($item, $privileges[$type]))
                unset($privileges[$type][array_search($item, $privileges[$type])]);

            $userType->privilege = $privileges;
            $userType->save();
        }
    }
}

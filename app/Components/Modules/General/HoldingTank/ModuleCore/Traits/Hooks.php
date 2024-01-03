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

namespace App\Components\Modules\General\HoldingTank\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Eloquents\HoldingUsers;
use App\Eloquents\User;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\HoldingTank\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'addUser']);

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);

        registerFilter('positionFilter', function ($position, $sponsorInfo) {
            return $this->getPosition(User::find($sponsorInfo));
        }, 'Plan', 0);
    }

    function addUser(UserServices $userServices)
    {
        registerAction('postAddUser', function ($data) use ($userServices) {
            return $this->addUserToHoldingTank($data->get('result'));
        }, 'registration');
    }

    /**
     * @param MenuServices $menuServices
     */
    public function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => ['en' => 'Holding Tank'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.holdingTank',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-list',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => 'Holding Tank - Admin'
                ],
                [
                    'label' => ['en' => 'Holding Tank'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.holdingTank',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-list',
                    'parent_id' => 'network',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => 'Holding Tank - User'
                ]
            ]));
        });
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            HoldingTank::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {
            HoldingTank::insert([
                ["user_id" => 1, 'status' => false],
                ["user_id" => 2, 'status' => false]
            ]);
        }, 'systemRefresh');
    }
}

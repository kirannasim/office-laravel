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

namespace App\Components\Modules\General\MiniHoldingTank\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UserServices;
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
        app()->call([$this, 'leftMenus']);
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
                    'label' => ['en' => 'Mini Holding Tank'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.miniHoldingTank',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-list',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => 'Holding Tank - Admin'
                ],
                [
                    'label' => ['en' => 'Mini Holding Tank'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.miniHoldingTank',
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
}

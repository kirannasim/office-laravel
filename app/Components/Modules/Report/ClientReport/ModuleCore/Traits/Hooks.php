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

namespace App\Components\Modules\Report\ClientReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\ClientReport\ModuleCore\Traits;
 */
trait Hooks
{
    /**
     * Registers required hooks
     *
     * @return void
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
                    'label' => ['en' => 'Clients'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.clientReport.index',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '11',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Clients'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.clientReport.index',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '2',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }
}

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

namespace App\Components\Modules\General\Xoom\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\Xoom\ModuleCore\Traits
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

        app()->call([$this, 'systemRefresh']);
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
                    'label' => ['en' => 'XOOM', 'es' => 'XOOM', 'ru' => 'XOOM', 'ko' => 'XOOM', 'pt' => 'XOOM', 'ja' => 'XOOM', 'zh' => 'XOOM', 'vi' => 'XOOM', 'sw' => 'XOOM', 'hi' => 'XOOM', 'fr' => 'XOOM', 'it' => 'XOOM'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.xoom',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-desktop-alt',
                    'parent_id' => '',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '10',
                    'protected' => '0',
                    'description' => 'Connect Online',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'XOOM', 'es' => 'XOOM', 'ru' => 'XOOM', 'ko' => 'XOOM', 'pt' => 'XOOM', 'ja' => 'XOOM', 'zh' => 'XOOM', 'vi' => 'XOOM', 'sw' => 'XOOM', 'hi' => 'XOOM', 'fr' => 'XOOM', 'it' => 'XOOM'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.xoom.manage',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-desktop-alt',
                    'parent_id' => 'settings',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '8',
                    'protected' => '0',
                    'description' => 'Connect Online',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'XOOM', 'es' => 'XOOM', 'ru' => 'XOOM', 'ko' => 'XOOM', 'pt' => 'XOOM', 'ja' => 'XOOM', 'zh' => 'XOOM', 'vi' => 'XOOM', 'sw' => 'XOOM', 'hi' => 'XOOM', 'fr' => 'XOOM', 'it' => 'XOOM'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'employee.xoom.manage',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-desktop-alt',
                    'parent_id' => '',
                    'permit' => ['employee:defaultEmployee'],
                    'sort_order' => '8',
                    'protected' => '0',
                    'description' => 'Connect Online',
                    'attributes' => '',
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
            if ($args['forceTruncate']) {
                Xoom::truncate();
                XoomCategory::truncate();
                XoomUser::truncate();
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
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

namespace App\Components\Modules\General\SoHo\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\SoHo\ModuleCore\Traits
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
                    'label' => ['en' => 'SoHo', 'es' => 'SoHo', 'ru' => 'SoHo', 'ko' => 'SoHo', 'pt' => 'SoHo', 'ja' => 'SoHo', 'zh' => 'SoHo', 'vi' => 'SoHo', 'sw' => 'SoHo', 'hi' => 'SoHo', 'fr' => 'SoHo', 'it' => 'SoHo'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.soho',
                    'icon_image' => '',
                    'icon_font' => 'fas fa-comment-alt',
                    'parent_id' => '',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '11',
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
                //
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
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

namespace App\Components\Modules\General\DownLineList\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\DownLineList\Controllers\DownLineListControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\DownLineList\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        return app()->call([$this, 'downLineListHooks']);
    }

    /**
     * Register hooks
     *
     * @return Void
     */
    public function downLineListHooks(MenuServices $menuServices, Request $request)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => ['en' => 'Down Line List', 'es' => 'Down Line List', 'ru' => 'Down Line List', 'ko' => 'Down Line List', 'pt' => 'Down Line List', 'ja' => 'Down Line List', 'zh' => 'Down Line List', 'vi' => 'Down Line List', 'sw' => 'Down Line List', 'hi' => 'Down Line List', 'fr' => 'Down Line List', 'it' => 'Down Line List'],
                    'link' => '',
                    'route' => '',
                    'route_name' => '',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user',
                    'parent_id' => 'network',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '4',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });

        registerFilter('memberManagement', function ($content) {
            return $content .= "<li data-target='downlineList'>
             <i class='fa fa-sitemap' aria-hidden='true'></i>
                <p>" . _mt('General-DownLineList', 'DownLineList.downlineList') . "</p>
                
            </li>";
        }, 'nav');

        registerFilter('memberManagement', function ($content) {
            return $content .= '<form class="panelForm" data-unit="downlineList" data-target="downlineList"></form>';
        }, 'slice');

        registerFilter('memberManagement', function ($content, $action) use ($request) {
            if ($action != 'downlineList') return $content;

            return app()->call([app(DownLineListControllers::class), 'getDownlines']);
        }, 'unitFilter');
    }
}
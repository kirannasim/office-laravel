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

namespace App\Components\Modules\Tree\TabularTree\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Tree\TabularTree\Traits
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
        return app()->call([$this, 'leftMenus']);
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
                    'label' => ['en' => 'Tree Explorer', 'es' => 'Explorador de arboles', 'ru' => 'Проводник Дерева', 'ko' => '트리 탐색기', 'pt' => 'Explorador da Árvore', 'ja' => 'ツリーエクスプローラ', 'zh' => '树探索者', 'vi' => 'Cây thám hiểm', 'sw' => 'Mtafiti wa Miti', 'hi' => 'ट्री एक्सप्लोरर', 'fr' => 'Explorateur d\'arbres', 'it' => 'Tree Explorer'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.tree.tabularTree:type=placement',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-list',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => 'Tree Explorer - Admin'
                ]
               // [
               //     'label' => ['en' => 'Tree Explorer', 'es' => 'Explorador de arboles', 'ru' => 'Проводник Дерева', 'ko' => '트리 탐색기', 'pt' => 'Explorador da Árvore', 'ja' => 'ツリーエクスプローラ', 'zh' => '树探索者', 'vi' => 'Cây thám hiểm', 'sw' => 'Mtafiti wa Miti', 'hi' => 'ट्री एक्सप्लोरर', 'fr' => 'Explorateur d\'arbres', 'it' => 'Tree Explorer'],
               //     'link' => '',
               //     'route' => '',
               //     'route_name' => 'user.tree.tabularTree:type=placement',
               //     'icon_image' => '',
               //     'icon_font' => 'fa fa-list',
               //     'parent_id' => 'network',
               //     'permit' => ['user:defaultUser'],
               //     'sort_order' => '3',
               //     'protected' => '0',
               //     'description' => 'Tree Explorer - User'
               // ]
            ]));
        });
    }
}

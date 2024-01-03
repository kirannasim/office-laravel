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

namespace App\Components\Modules\Tree\GenealogyTree\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Tree\GenealogyTree\Traits
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
                    'label' => ['en' => 'Placement Tree', 'es' => 'Vista de genealogía', 'ru' => 'Генеалогия Вид', 'ko' => '계통 학보기', 'pt' => 'Visão Genealogia', 'ja' => '系図ビュー', 'zh' => '家谱观', 'vi' => 'Gia phả', 'sw' => 'Mtazamo wa kizazi', 'hi' => 'वंशावली देखें', 'fr' => 'Généalogie Voir', 'it' => 'Visualizzazione genealogica'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.tree.genealogyTree:type=placement',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-share-alt',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '2',
                    'protected' => '0',
                    'description' => 'Genealogy view - Admin'
                ],
//                [
//                    'label' => ['en' => 'Placement Tree', 'es' => 'Vista de genealogía', 'ru' => 'Генеалогия Вид', 'ko' => '계통 학보기', 'pt' => 'Visão Genealogia', 'ja' => '系図ビュー', 'zh' => '家谱观', 'vi' => 'Gia phả', 'sw' => 'Mtazamo wa kizazi', 'hi' => 'वंशावली देखें', 'fr' => 'Généalogie Voir', 'it' => 'Visualizzazione genealogica'],
//                    'link' => '',
//                    'route' => '',
//                    'route_name' => 'user.tree.genealogyTree:type=placement',
//                    'icon_image' => '',
//                    'icon_font' => 'fa fa-share-alt',
//                    'parent_id' => 'network',
//                    'permit' => ['user:defaultUser'],
//                    'sort_order' => '2',
//                    'protected' => '0',
//                    'description' => 'Genealogy view - User'
//                ],
                [
                    'label' => ['en' => 'Sponsor Tree', 'es' => 'Vista de genealogía', 'ru' => 'Генеалогия Вид', 'ko' => '계통 학보기', 'pt' => 'Visão Genealogia', 'ja' => '系図ビュー', 'zh' => '家谱观', 'vi' => 'Gia phả', 'sw' => 'Mtazamo wa kizazi', 'hi' => 'वंशावली देखें', 'fr' => 'Généalogie Voir', 'it' => 'Visualizzazione genealogica'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.tree.genealogyTree:type=sponsor',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-share-alt',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => 'Genealogy view - Admin'
                ],
//                [
//                    'label' => ['en' => 'Sponsor', 'es' => 'Vista de genealogía', 'ru' => 'Генеалогия Вид', 'ko' => '계통 학보기', 'pt' => 'Visão Genealogia', 'ja' => '系図ビュー', 'zh' => '家谱观', 'vi' => 'Gia phả', 'sw' => 'Mtazamo wa kizazi', 'hi' => 'वंशावली देखें', 'fr' => 'Généalogie Voir', 'it' => 'Visualizzazione genealogica'],
//                    'link' => '',
//                    'route' => '',
//                    'route_name' => 'user.tree.genealogyTree:type=sponsor',
//                    'icon_image' => '',
//                    'icon_font' => 'fa fa-share-alt',
//                    'parent_id' => 'network',
//                    'permit' => ['user:defaultUser'],
//                    'sort_order' => '3',
//                    'protected' => '0',
//                    'description' => 'Genealogy view - User'
//                ]
            ]));
        });
    }
}
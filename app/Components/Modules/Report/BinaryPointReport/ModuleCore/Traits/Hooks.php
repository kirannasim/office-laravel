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

namespace App\Components\Modules\Report\BinaryPointReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\BinaryPointReport\ModuleCore\Traits
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
                    'label' => ['en' => 'CV Points', 'es' => 'Puntos binarios', 'ru' => 'Бинарные Очки', 'ko' => '이진 점', 'pt' => 'Pontos Binários', 'ja' => 'バイナリポイント', 'zh' => '二进制点', 'vi' => 'Điểm nhị phân', 'sw' => 'Pointi za Binary', 'hi' => 'बाइनरी पॉइंट्स', 'fr' => 'Points binaires', 'it' => 'Punti binari'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.report.binaryPoint',
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
                    'label' => ['en' => 'CV Points', 'es' => 'Puntos binarios', 'ru' => 'Бинарные Очки', 'ko' => '이진 점', 'pt' => 'Pontos Binários', 'ja' => 'バイナリポイント', 'zh' => '二进制点', 'vi' => 'Điểm nhị phân', 'sw' => 'Pointi za Binary', 'hi' => 'बाइनरी पॉइंट्स', 'fr' => 'Points binaires', 'it' => 'Punti binari'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.report.binaryPoint',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '2',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Cycle Report', 'es' => '', 'ru' => '', 'ko' => '', 'pt' => '', 'ja' => '', 'zh' => '', 'vi' => '', 'sw' => '', 'hi' => '', 'fr' => '', 'it' => ''],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.report.cycleReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '3',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Cycle Report', 'es' => '', 'ru' => '', 'ko' => '', 'pt' => '', 'ja' => '', 'zh' => '', 'vi' => '', 'sw' => '', 'hi' => '', 'fr' => '', 'it' => ''],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.report.cycleReport',
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

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

namespace App\Components\Modules\Report\ActivityReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\ActivityReport\ModuleCore\Traits
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
                    'label' => ['en' => 'Activity', 'es' => 'Actividad', 'ru' => 'Деятельность', 'ko' => '활동', 'pt' => 'Atividade', 'ja' => 'アクティビティ', 'zh' => '活动', 'vi' => 'Hoạt động', 'sw' => 'Shughuli', 'hi' => 'गतिविधि', 'fr' => 'Activité', 'it' => 'Attività'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.report.activity',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '10',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Activity', 'es' => 'Actividad', 'ru' => 'Деятельность', 'ko' => '활동', 'pt' => 'Atividade', 'ja' => 'アクティビティ', 'zh' => '活动', 'vi' => 'Hoạt động', 'sw' => 'Shughuli', 'hi' => 'गतिविधि', 'fr' => 'Activité', 'it' => 'Attività'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.report.activity',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-history',
                    'parent_id' => 'reports',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '1',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }
}

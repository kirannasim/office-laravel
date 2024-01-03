<?php

namespace App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits
 */
trait Hooks
{

    /**
     *
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
                    'label' => ['en' => 'Package Sales', 'es' => '', 'ru' => '', 'ko' => '', 'pt' => '', 'ja' => '', 'zh' => '', 'vi' => '', 'sw' => '', 'hi' => '', 'fr' => '', 'it' => ''],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.packageSales.index',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '5',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }
}
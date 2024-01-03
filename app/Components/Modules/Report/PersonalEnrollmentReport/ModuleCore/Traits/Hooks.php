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

namespace App\Components\Modules\Report\PersonalEnrollmentReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\IBEnroleeReport\ModuleCore\Traits
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
                    'label' => ['en' => 'Personal Enrollee'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.report.personalEnrollee',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user',
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

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

namespace App\Components\Modules\General\EazySignup\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\EazySignup\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Register hooks
     *
     * @return Void
     */
    public function hooks()
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
                    'label' => ['en' => 'Influencer Signup'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.eazySignup',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user-plus',
                    'parent_id' => 'network',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '4',
                    'protected' => '0',
                    'description' => 'Influencer Signup'
                ],
            ]));
        });
    }


    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            if ($args['forceTruncate']) {
                EasySignupHistory::truncate();
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}

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

namespace App\Components\Modules\General\News\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\News\ModuleCore\Eloquents\News;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\News\ModuleCore\Traits
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
        registerFilter('dashboardBlock', function ($content) {
            return $content . app()->call([$this, 'dashboardNewsTile']);
        }, 'newsBlock');

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
                    'label' => ['en' => 'News', 'es' => 'Noticias', 'ru' => 'Новости', 'ko' => '뉴스', 'pt' => 'notícia', 'ja' => 'ニュース', 'zh' => '新闻', 'vi' => 'Tin tức', 'sw' => 'Habari', 'hi' => 'समाचार', 'fr' => 'Nouvelles', 'it' => 'notizia'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.news.manage',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-newspaper-o',
                    'permit' => ['admin:defaultAdmin'],
                    'parent_id' => 'tools',
                    'sort_order' => '1',
                    'protected' => '0',
                    'description' => '',
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
            News::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}

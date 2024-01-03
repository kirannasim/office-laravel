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

namespace App\Components\Modules\General\Faq\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq;
use App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\Faq\ModuleCore\Traits
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
                    'label' => ['en' => 'FAQ', 'es' => 'Faq', 'ru' => 'Faq', 'ko' => '자주 묻는 질문', 'pt' => 'Perguntas frequentes', 'ja' => 'よくある質問', 'zh' => '常问问题', 'vi' => 'Pháp', 'sw' => 'Faq', 'hi' => 'सामान्य प्रश्न', 'fr' => 'Faq', 'it' => 'Faq'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.faq',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-question',
                    'parent_id' => 'tools',
                    'permit' => ['user:defaultUser'],
                    'sort_order' => '1',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'FAQ', 'es' => 'Faq', 'ru' => 'Faq', 'ko' => '자주 묻는 질문', 'pt' => 'Perguntas frequentes', 'ja' => 'よくある質問', 'zh' => '常问问题', 'vi' => 'Pháp', 'sw' => 'Faq', 'hi' => 'सामान्य प्रश्न', 'fr' => 'Faq', 'it' => 'Faq'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.faq.manage',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-question',
                    'parent_id' => 'tools',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '1',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'FAQ', 'es' => 'Faq', 'ru' => 'Faq', 'ko' => '자주 묻는 질문', 'pt' => 'Perguntas frequentes', 'ja' => 'よくある質問', 'zh' => '常问问题', 'vi' => 'Pháp', 'sw' => 'Faq', 'hi' => 'सामान्य प्रश्न', 'fr' => 'Faq', 'it' => 'Faq'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'employee.faq.manage',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-question',
                    'parent_id' => 'tools',
                    'permit' => ['employee:defaultEmployee'],
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
            if ($args['forceTruncate']) {
                Faq::truncate();
                FaqCategory::truncate();
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankPersonalize;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankPersonalizeHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers hooks
     */
    function hooks()
    {
        /** Personalised setting option */
        registerFilter('personalizedSettingsMenu', function ($content) {
            return $this->getPersonalizedSettingsMenu($content);
        }, 'memberManagement');

        registerFilter('personalizedSettingsContent', function ($content, $user) {
            return $this->getPersonalizedSettingsContent($user);
        }, 'memberManagement');

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);
    }


    /**
     * @param MenuServices $menuServices
     */
    function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => ['en' => 'Rank Performance', 'es' => 'Rango de rendimiento', 'ru' => 'Рейтинг производительности', 'ko' => '실적 순위 지정', 'pt' => 'Desempenho de Rank', 'ja' => 'ランクパフォーマンス', 'zh' => '排名表现', 'vi' => 'Xếp hạng hiệu suất'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'advancedRankReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-graduation-cap',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '6',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Rank Analysis', 'es' => 'Análisis de rango', 'ru' => 'Ранговый анализ', 'ko' => '순위 분석', 'pt' => 'Análise de classificação', 'ja' => 'ランク分析', 'zh' => '等级分析', 'vi' => 'Phân tích thứ hạng'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'advancedRankAchievementHistoryReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-sort-amount-desc',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '7',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Total Active Users', 'es' => '', 'ru' => '', 'ko' => '', 'pt' => '', 'ja' => '', 'zh' => '', 'vi' => ''],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'totalRankSummaryReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-sort-amount-desc',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '7',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
            ]));
        });
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            AdvancedRankUser::truncate();
            AdvancedRankAchievementHistory::truncate();
            AdvancedRankPersonalizeHistory::truncate();
            AdvancedRankPersonalize::truncate();
            if ($args['forceTruncate']) {
                AdvancedRankBenefit::truncate();
                AdvancedRank::truncate();
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {
            if ($args['forceRefresh']) {

            }
        }, 'systemRefresh');
    }
}

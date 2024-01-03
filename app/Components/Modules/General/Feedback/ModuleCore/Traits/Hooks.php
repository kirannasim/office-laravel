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

namespace App\Components\Modules\General\Feedback\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\Feedback\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);
    }

    /**
     * Register hooks
     *
     * @param MenuServices $menuServices
     * @return Void
     */
    public function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {

            $feedBacks = FeedbackForm::get();

            $feedbackMenus[] = [
                'label' => ['en' => 'Feedback', 'es' => 'Realimentación', 'ru' => 'Обратная связь', 'ko' => '피드백', 'pt' => 'Comentários', 'ja' => 'フィードバック', 'zh' => '反馈', 'vi' => 'Phản hồi', 'sw' => 'Maoni', 'hi' => 'प्रतिक्रिया', 'fr' => 'Retour d\'information', 'it' => 'Risposta'],
                'link' => '',
                'route' => '',
                'route_name' => 'feedback.userFeedback',
                'icon_image' => '',
                'icon_font' => 'fa fa-rss-square',
                'parent_id' => 'tools',
                'sort_order' => '2',
                'permit' => ['admin:defaultAdmin'],
                'protected' => '0',
                'description' => '',
                'attributes' => '',
            ];

            foreach ($feedBacks as $feedback) {
                $feedbackMenus[] = [
                    'label' => ['en' => $feedback->name],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'user.feedback:id=' . $feedback->id,
                    'icon_image' => '',
                    'icon_font' => 'fa fa-rss-square',
                    'parent_id' => 'tools',
                    'sort_order' => '2',
                    'permit' => ['user:defaultUser'],
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ];
            }

            return $menus->merge($menuServices->menusFromRaw($feedbackMenus));
        });
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            UserFeedback::truncate();
            if ($args['forceTruncate']) {
                FeedbackOption::truncate();
                FeedbackQuestion::truncate();
                FeedbackForm::truncate();
            }
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}

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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelectorHistory;
use App\Eloquents\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        registerFilter('dashboardBlock', function ($content) {
            return $content . app()->call([$this, 'binaryPositionSelector']);
        }, 'defaultBinaryPositionSelector', 1);

        app()->call([$this, 'defaultBinaryPositionSelectorHooks']);

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);
    }

    /**
     * Register hooks
     *
     * @param Request $request
     * @param UserServices $userServices
     * @return Void
     */
    public function defaultBinaryPositionSelectorHooks(Request $request, UserServices $userServices)
    {
        /** Personalised setting option */
        registerFilter('personalizedSettingsMenu', function ($content) {
            return $this->getPersonalizedSettingsMenu($content);
        }, 'memberManagement');

        registerFilter('personalizedSettingsContent', function ($content, $user) {
            return $this->getPersonalizedSettingsContent($user);
        }, 'memberManagement');

        registerFilter('profileMenuItem', function ($content) {
            return $this->getAdminProfile($content);
        }, 'adminProfile');

        registerFilter('profileUnit', function ($content, $action) use ($request) {
            if ($action == 'default_binary_position_selector')
                return $this->getProfileContent($request);
            else
                return $content;

        }, 'unitFilter');

        registerFilter('profileMenuItem', function ($content) {
            return $this->getAdminProfile($content);
        }, 'userProfile');

        registerAction('postRegistration', function ($data) {
            /** @var Collection $data */
            if($data->get('result')['user']->repoData)
                UserRepo::where('user_id', $data->get('result')['user']->id)->update(['default_binary_position' => 3]);
        }, 'registration', 0);
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
                    'label' => ['en' => 'Default Position', 'es' => 'Posición predeterminada binaria', 'ru' => 'Положение по умолчанию', 'ko' => '기본 위치', 'pt' => 'Localização padrão', 'ja' => 'デフォルトの場所', 'zh' => '默认位置', 'vi' => 'Vị trí mặc định', 'sw' => 'Nafasi ya Kichwa', 'hi' => 'अप्राप्त स्थिति', 'fr' => 'Position par défaut', 'it' => 'Posizione di default'],
                    'link' => NULL,
                    'route' => NULL,
                    'route_name' => 'defaultBinaryPositionReport',
                    'icon_image' => NULL,
                    'icon_font' => 'fa fa-exchange',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '10',
                    'protected' => 0,
                    'description' => NULL,
                    'attributes' => NULL,
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
            BinaryPositionSelectorHistory::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}

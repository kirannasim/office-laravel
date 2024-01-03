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

namespace App\Components\Modules\General\ChangeSponsor\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\ChangeSponsor\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'changeSponsorHooks']);

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
    public function changeSponsorHooks(Request $request, UserServices $userServices)
    {
        registerFilter('memberManagement', function ($content) {
            return $content .= "<li data-target='change_sponsor'>
             <i class='fa fa-exchange' aria-hidden='true'></i>
                <p>" . _mt('General-ChangeSponsor', 'ChangeSponsor.changeSponsor') . "</p>
            </li>";
        }, 'nav');

        registerFilter('memberManagement', function ($content) {
            return $content .= '<form class="panelForm" data-unit="change_sponsor" data-target="change_sponsor"></form>';
        }, 'slice');

        registerFilter('memberManagement', function ($content, $action) use ($userServices, $request) {
            if ($action != 'change_sponsor') return $content;

            if ($userServices->getUserType($request->user) != 'admin') {
                $data = [
                    'scripts' => [
                        asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                        asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                    ],
                    'styles' => [
                        getModule($this->moduleId)->getCssPath('style.css'),
                    ],
                    'moduleId' => $this->moduleId,
                    'sponsor_id' => $userServices->getSponsorId($request->user),
                    'user_id' => $request->user,
                ];
                return view('General.ChangeSponsor.Views.index', $data);
            }

            $data['user_id'] = $request->user;

            echo "<div class='heading'><h3>" .
                _mt($this->moduleId, 'ChangeSponsor.changeSponsor')
                . "</h3>
</div><div class='col-md-12 changePlacementExclamation' style='padding: 20px 0px;'>
        <div style='display: inline-block;padding-right: 10px;color: #c7c1c1;font-size: 15px;float: left;'><i class='fa fa-exclamation-triangle' style='color: #c7c1c1;font-size: 20px;'></i></div><div class='exContent' style='display: inline-block;float: left;'>" . _mt($this->moduleId, 'ChangeSponsor.cantChangeSponsor') . "</div></div>";

        }, 'unitFilter');
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
                    'label' => ['en' => 'Sponsor Changes', 'es' => 'Cambios de patrocinador', 'ru' => 'Изменения спонсора', 'ko' => '스폰서 변경', 'pt' => 'Mudanças do Patrocinador', 'ja' => 'スポンサーの変更', 'zh' => '赞助商变更', 'vi' => 'Thay đổi tài trợ', 'sw' => 'Mabadiliko ya Wadhamini', 'hi' => 'प्रायोजक परिवर्तन', 'fr' => 'Changements de sponsor', 'it' => 'Cambiamenti dello sponsor'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'changeSponsorReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-exchange',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '9',
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
            ChangeSponsorHistory::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
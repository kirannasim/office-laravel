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

namespace App\Components\Modules\General\ChangePlacement\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\ChangePlacement\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'changePlacementHooks']);

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
    public function changePlacementHooks(Request $request, UserServices $userServices)
    {
        registerFilter('memberManagement', function ($content) {
            return $content .= "<li data-target='change_placement'>
             <i class='fa fa-exchange' aria-hidden='true'></i>
                <p>" . _mt('General-ChangePlacement', 'ChangePlacement.changePlacement') . "</p>
                
            </li>";
        }, 'nav');

        registerFilter('memberManagement', function ($content) {
            return $content .= '<form class="panelForm" data-unit="change_placement" data-target="change_placement"></form>';
        }, 'slice');

        registerFilter('memberManagement', function ($content, $action) use ($userServices, $request) {
            if ($action != 'change_placement') return $content;

            if ($userServices->getUserType($request->user) != 'admin') {
                $data = [
                    'scripts' => [
                        asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                        asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                    ],
                    'styles' => [
                        getModule($this->moduleId)->getCssPath('style.css'),
                    ],
                    'moduleId'        => $this->moduleId,
                    'placement_id'    => $userServices->getSponsorId($request->user),
                    'position'        => $userServices->getUser($request->user)->repoData->position,
                    'user_id'         => $request->user,
                    'sponsor_members' => $userServices->getSponsorMembersCount($request->user),
                ];
                return view('General.ChangePlacement.Views.index', $data);
            }

            $data['user_id'] = $request->user;

            echo "<div class='heading'><h3>" .
                _mt('General-ChangePlacement', 'ChangePlacement.changePlacement')
                . "</h3>
</div><div class='col-md-12 changePlacementExclamation' style='padding: 20px 0px;'>
        <div style='display: inline-block;padding-right: 10px;color: #c7c1c1;font-size: 15px;float: left;'><i class='fa fa-exclamation-triangle' style='color: #c7c1c1;font-size: 20px;'></i></div><div class='exContent' style='display: inline-block;float: left;'>" . _mt('General-ChangePlacement', 'ChangePlacement.cantChangePlacement') . "</div></div>";

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
                    'label' => ['en' => 'Placement Changes', 'es' => 'Cambios de ubicación', 'ru' => 'Изменения мест размещения', 'ko' => '게재 위치 변경', 'pt' => 'Alterações de posicionamento', 'ja' => '配置の変更', 'zh' => '展示位置更改', 'vi' => 'Thay đổi vị trí', 'sw' => 'Mabadiliko ya Mahali', 'hi' => 'स्थान परिवर्तन', 'fr' => 'Changements d\'emplacement', 'it' => 'Modifiche al posizionamento'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'changePlacementReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-exchange',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '8',
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
            ChangePlacementHistory::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
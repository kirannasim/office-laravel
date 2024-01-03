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

namespace App\Components\Modules\Security\AdvancedPrivileges\Controllers;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\ThemeServices;
use App\Components\Modules\Security\AdvancedPrivileges\AdvancedPrivilegesIndex as Module;
use App\Eloquents\EasyRoute;
use App\Eloquents\UserSubType;
use App\Eloquents\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class PrivilegeController
 * @package App\Components\Modules\Security\AdvancedPrivileges\Controllers
 */
class PrivilegeController extends Controller
{
    protected $module;

    protected $allowedFields = ['route_name', 'route_uri', 'route_controller'];

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * Privilege handler for main user type
     *
     * @param MenuServices $menuFactory
     * @param ModuleServices $moduleServices
     * @param ThemeServices $themeServices
     * @return View
     */
    function shortlist(MenuServices $menuFactory, ModuleServices $moduleServices, ThemeServices $themeServices)
    {
        $data = [];
        $data['title'] = _mt($this->module->moduleId, 'AdvancedPrivileges.Shortlist');
        $data['heading_text'] = _mt($this->module->moduleId, 'AdvancedPrivileges.Shortlist');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'AdvancedPrivileges.Advanced_Privileges') => 'privilages.show',
            _mt($this->module->moduleId, 'AdvancedPrivileges.Shortlist') => 'privilages.show',
        ];

        $data['styles'] = [
            $this->module->getCssPath() . 'style.css',
        ];
        $data['modules'] = $moduleServices->getModules();
        $data['themes'] = $themeServices->getThemes();
        $data['menus'] = $menuFactory->getAllMenus();//die(print_r($data['menus']));
        $data['userTypes'] = UserType::all();
        $data['routes'] = EasyRoute::all();

        return view('Security.AdvancedPrivileges.Views.shortlist', $data);
    }

    /**
     * Privilege handler for main user type
     *
     * @return View
     */
    function showPrivileges()
    {
        $data = [];
        $data['title'] = _mt($this->module->moduleId, 'AdvancedPrivileges.Assign_Privilege');
        $data['heading_text'] = _mt($this->module->moduleId, 'AdvancedPrivileges.Assign_Privilege');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'AdvancedPrivileges.Advanced_Privileges') => 'privilages.show',
            _mt($this->module->moduleId, 'AdvancedPrivileges.Assign_Privilege') => 'privilages.show',
        ];


        $data['scripts'] = [
            asset('global/plugins/select2/js/select2.full.min.js'),
        ];
        $data['styles'] = [
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            $this->module->getCssPath() . 'style.css',
        ];

        return view('Security.AdvancedPrivileges.Views.assign', $data);
    }

    /**
     * Privilege Assign Form
     *
     * @param Request $request
     * @param MenuServices $menuFactory
     * @param ModuleServices $moduleServices
     * @param ThemeServices $themeServices
     * @return View
     */
    function privilegeAssignForm(Request $request, MenuServices $menuFactory, ModuleServices $moduleServices, ThemeServices $themeServices)
    {
        if (!$userType = UserSubType::find($userGroup = $request->input('user_group', 1)))
            return response('Invalid request !', 422);

        $primaryGroup = UserSubType::find($userGroup)->user_type_id;
        $primaryPrivileges = collect(UserType::find($primaryGroup)->privilege);
        $subPrivileges = collect($userType->privilege ?: []);
        $modules = $primaryPrivileges->get('modules');

        if ($modules) {
            foreach ($modules as $key => $slug) {
                list($pool, $name) = explode('-', $slug);
                $data['modules'][$pool][$name] = $moduleServices->getModule($slug)->registry;
            }
        }

        $themes = $primaryPrivileges->get('themes');

        if ($themes) {
            foreach ($themes as $key => $slug) {
                $data['themes'][$slug] = $themeServices->getTheme($slug)->registry;
            }
        }

        $menus = $primaryPrivileges->get('menus');
        $data['privileges'] = $subPrivileges;
        $data['userGroup'] = $userGroup;
        $data['menus'] = $menuFactory->getAllMenus('left', $menus);
        $data['routes'] = $primaryPrivileges->get('routes') ? EasyRoute::find($primaryPrivileges->get('routes', []))->all() : [];
        $data['userTypes'] = UserType::with('subTypes')->get();

        return view('Security.AdvancedPrivileges.Views.Partials.assignForm', $data);
    }

    /**
     * Save Privilege
     *
     * @param Request $request
     * @param MenuServices $menuFactory
     * @return \Illuminate\Http\JsonResponse [type]
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    function savePrivileges(Request $request, MenuServices $menuFactory)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $action = $request->input('action');
        $eloquent = ($action == 'shortlist') ? UserType::class : ($action == 'assign' ? UserSubType::class : null);
        /** @var Model $model */
        if ($eloquent && (!$model = $eloquent::find($request->input('user_group'))))
            return response()->json(['status' => false, 'error' => 'Invalid user group or unacceptable action!'], 422);

        $entries = $request->only(['modules', 'themes', 'menus']);
        $routes = $request->input('routes');

        foreach ($request->input('menus', []) as $key => $menu)
            if (($menu = $menuFactory->getMenu($menu)) && $menu['route']) $routes[] = $menu['route'];

        $entries['routes'] = $routes;
        $model->update(['privilege' => $entries]);

        return response()->json(['status' => true]);
    }

    /**
     * Query ShortList
     *
     * @param Request $request [description]
     * @return \Illuminate\Http\JsonResponse
     */

    function queryShortList(Request $request)
    {
        if (!$model = UserType::find($request->input('id')))
            return response()->json(['status' => false, 'error' => 'Invalid user group!'], 422);
        else
            return response()->json($model->privilege);
    }

    /**
     * Query ShortList
     *
     * @param Request $request [description]
     * @return \Illuminate\Http\JsonResponse
     */
    function queryPrivileges(Request $request)
    {
        if (!$model = UserSubType::find($request->input('id')))
            return response()->json(['status' => false, 'error' => 'Invalid user group!'], 422);
        else
            return response()->json($model->privilege);
    }
}

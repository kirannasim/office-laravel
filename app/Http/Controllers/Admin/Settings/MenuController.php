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

namespace App\Http\Controllers\Admin\Settings;

use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\EasyRoute;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Factory;
use Throwable;

/**
 * Class MenuController
 * @package App\Http\Controllers\Admin\Settings
 */
class MenuController extends Controller
{
    /**
     * Menu customization page index
     *
     * @param MenuServices $menuServices
     * @return View
     */
    function index(MenuServices $menuServices)
    {
        $data = [
            'title' => _t('settings.Menu_Management'),
            'heading_text' => _t('settings.Menu_Management'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('settings.Settings') => 'admin.menu',
                _t('settings.Menu_Management') => 'admin.menu'
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/jquery-nestable/jquery.nestable.js'),
                asset('pages/scripts/ui-nestable.js'),
            ],
            'styles' => [
                asset('global/plugins/jquery-nestable/jquery.nestable.css'),
            ],
            'leftMenus' => $menuServices->getAllMenus('left'),
            'routes' => EasyRoute::all(),
            'locals' => getLocals(),
            'currentLocal' => currentLocal(),
        ];

        return view('Admin.Settings.menu', $data);
    }

    /**
     * insert menu sorting & contents
     *
     * @param Request $request
     * @param MenuServices $factory
     * @return ResponseFactory
     */
    function insert(Request $request, MenuServices $factory)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $type = $request->input('type');

        $this->validate($request, $this->validationRules($type), $this->validationMessages());

        return response()->json($factory->insert($type, $request->except(['type'])));
    }

    /**
     * @param string $type
     * @return array
     */
    function validationRules($type = 'leftMenu')
    {
        return [
            "$type.label." . currentLocal() => 'required|min:2',
            "$type.link" => "required_without:$type.route|nullable|min:1",
            "$type.route" => "required_without:$type.link|nullable",
            "$type.routeParams.*" => "required_with:$type.route|min:1",
        ];
    }

    /**
     * @param string $type
     * @return array
     */
    function validationMessages($type = 'leftMenu')
    {
        return [
            "$type.label.*" => 'Invalid name given!',
            "$type.link.*" => 'Link is not valid!',
            "$type.route.*" => 'Route is not valid!',
            "$type.routeParams.*" => 'Route parameters is not valid!',
        ];
    }

    /**
     * Update menu sorting & contents
     *
     * @param Request $request
     * @param MenuServices $menuServices
     * @param Factory $validatorFactory
     * @param UtilityServices $utilityServices
     * @return mixed
     */
    function update(Request $request, MenuServices $menuServices, Factory $validatorFactory, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        foreach ($request->input('menus') as $type => $menu) {
            foreach ($menu = (objToArray($menu)) as $key => $item) {
                $validator = $validatorFactory->make(
                    [$type => $dispatch = objToArray($item)], $this->validationRules($type), $this->validationMessages($type));

                if ($validator->fails())
                    return response(json_encode($validator->errors()), 422);

                $dispatch = count($menu) > 1 ? array_merge($item, ['sort_order' => $key]) : $item;

                if (!app()->call([$menuServices, 'update'], ['type' => $type, 'menu' => $dispatch]))
                    return response('issue found', 500);
            }
        }

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'menu_updated','on_user_id' =>loggedId()]);

        return response()->json(['status' => 'success']);
    }

    /**
     * @param Request $request
     * @param MenuServices $factory
     * @return string
     */
    function delete(Request $request, MenuServices $factory)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $type = $request->input('type');

        return $factory->delete($type, $request->input('id'));
    }

    /**
     * @param MenuServices $menuServices
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Throwable
     */
    function listMenu(MenuServices $menuServices, Request $request)
    {
        $menuType = $request->input('type', 'left');
        $method = 'list' . Str::camel($menuType) . 'Menu';
        $data = [
            'menuList' => $menuServices->{$method}(),
        ];

        return view('Admin.Settings.Partials.Menu.menuDraggableList', $data);
    }
}

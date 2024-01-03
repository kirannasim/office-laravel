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

namespace App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Services\PrivilegeServices;
use App\Eloquents\EasyRoute;
use App\Eloquents\LeftMenu;
use App\Eloquents\UserType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Trait Hooks
 * @package App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'registerHooks']);

        /*app()->call([$this, 'leftMenus']);*/
    }

    /**
     * Register hooks
     *
     * @param Request $request
     * @param PrivilegeServices $privilegeServices
     * @return Void
     */
    public function registerHooks(Request $request, PrivilegeServices $privilegeServices)
    {
        registerFilter('customMiddlewares', function ($request) {
            return $this->restrictByPrivilege($request);
        });
        // Filters out menus as per given privileges
        registerFilter('filterLeftMenu', function ($menu) {
            if (!$menu || $menu['protected']) return false;

            return isset($menu->id) ? ($this->checkMenuPrivilege($menu->id) ? $menu : false) : $menu;
        });
        // Filters out menus prior to be saved
        registerFilter('beforeMenuSaved', function ($menu, $args) use ($request) {
            if ($args['context'] == 'insert')
                $menu['protected'] = $request->input('leftMenu.restricted') ? true : false;
            else
                $menu['protected'] = $request->input('menus.leftmenu.' . $menu['id'] . '.restricted') ? true : false;

            return $menu;
        });
        // Triggers whitelisting action after menu saved
        registerAction('afterMenuSaved', function ($args) use ($request, $privilegeServices) {
            $menu = isset($args['menu']) ? $args['menu'] : null;
            $privilegeGroups = $args['privilegeGroups'];

            if ($menu && !$menu->protected && $privilegeGroups) {
                $privilegeServices->flushPrivilegedItem('menus', $menu->id);

                foreach ((array)$privilegeGroups as $privilege) {
                    list($userType, $subType) = explode('-', $privilege);

                    $privilegeServices->updatePrivilege('menus', $menu->id, $userType, $subType);
                }
            }

        });
        // Show privilege selection fields
        registerFilter('menuFormBottom', function ($content, $args) {
            return $content . $this->privilegeOptionInMenuForm($args);
        });

        registerFilter('memberManagement', function ($content) {
            return $content .= '<form class="panelForm" data-unit="example" data-target="example"></form>';
        }, 'slice');

        registerFilter('memberManagement', function ($content, $action) {
            if ($action == 'example')
                return 'hello example';
            else return $content;
        }, 'unitFilter');
    }

    /**
     * Restrict By Privilege description]
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Request|\Symfony\Component\HttpFoundation\Response
     */
    function restrictByPrivilege($request)
    {
        $routeExcluded = array_filter($this->excludedRoutes(), function ($route) {
            return wildcardCheck($route, request()->route()->getName());
        });
        $urisExcluded = array_filter($this->excludedUris(), function ($uri) {
            return preg_match("#$uri#", request()->getUri());
        });

        // if ($routeExcluded || $urisExcluded || (getScope() == 'shared')) return $request;

        // if (!loggedUser() || !$role = loggedUser()->role) return $this->throwPermissionError();

        // $privilege = $this->getPrivileges();
        // $routes = (new EasyRoute)->find(collect($privilege)->get('routes', []));

        // if ((!$privilege || !isset($privilege['routes']) || !$routes) && !$routeExcluded)
        //     return $this->throwPermissionError();

        // $allowedControllers = $routes->pluck('route_controller');
        // $requestedController = explode('@', $request->route()->getActionName())[0];

        // if ((new EasyRoute)->where('route_controller', $requestedController)->exists()
        //     && !$allowedControllers->contains($requestedController) && (!$routeExcluded) && (request()->method() == 'get'))
        //     return $this->throwPermissionError();

        return $request;
    }

    /**
     * @return array
     */
    function excludedRoutes()
    {
        return [
            'easyroutes*',
            'privilages*',
            'save.privilages',
            'login',
            '*.login',
            '*.loginAction',
            'register',
            '*.register',
            '*.registerAction',
            '*.password.email',
            '*.password.reset*',
            '*.getGateways',
            '*.payment.handler',
            '*.payment.callback',
            'b2b.*',
        ];
    }

    /**
     * @return array
     */
    function excludedUris()
    {
        return [
            '/*/register/packages/*',
            '/*/password/email/*'
        ];
    }

    /**
     * Throw Permission Error
     *
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response [type] [description]
     */
    function throwPermissionError($message = '')
    {
        return abort(403, 'Sorry this page is forbidden to you!');
        //return response($message ?: 'Sorry this page is forbidden to you!', 422);
    }

    /**
     * Get privilege details for current user
     *
     * @return array|mixed
     */
    function getPrivileges()
    {
        if (!$user = loggedUser()) return false;

        return $user->subType->privilege ?: [];//die(print_r($privilege));
    }

    /**
     * Check current user has permission to view the menu
     *
     * @param $id
     * @param string $type
     * @return bool
     * @throws \Exception
     */
    function checkMenuPrivilege($id, $type = LeftMenu::class)
    {
        /** @var MenuServices $menuServices */
        $menuServices = app(MenuServices::class);
        /** @var Model $menu */
        $menu = $id instanceof Model ? $id : (MenuServices::verifyDynamicId($id) ? $menuServices->resolveDynamicMenu($id) : (new $type())->find($id));

        if (!$menu) return;

        if ($menu->dynamic)
            return in_array(Str::camel(loggedUser()->userType->title) . ':' . Str::camel(loggedUser()->subType->title), $menu->permit ?: []);
        else
            return ($privilege = $this->getPrivileges()) && in_array($menu->id, (array)$privilege['menus']);
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function privilegeOptionInMenuForm($data)
    {
        $data['privileges'] = [];

        if (isset($data['menu']))
            foreach (UserType::all() as $userType) {
                $allPrivileges = $userType->privilege;
                if (isset($allPrivileges['menus']) && in_array($data['menu']->id, $allPrivileges['menus'])) {
                    foreach ($userType->subTypes as $subType) {
                        $shortlistedPrivileges = $subType->privilege;

                        if (isset($shortlistedPrivileges['menus']) && in_array($data['menu']->id, $shortlistedPrivileges['menus']))
                            $data['privileges'][] = $userType->id . '-' . $subType->id;
                    }
                }
            }

        return view('Security.AdvancedPrivileges.Views.Partials.privilegeOptionField', $data);
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
                    'label' => ['en' => 'Privilege', 'es' => 'Privilegio', 'ru' => 'льгота', 'ko' => '특권', 'pt' => 'Privilégio', 'ja' => '特権', 'zh' => '特权', 'vi' => 'Đặc quyền', 'sw' => 'Uwezo', 'hi' => 'विशेषाधिकार', 'fr' => 'Privilège', 'it' => 'Privilegio'],
                    'link' => NULL,
                    'route' => NULL,
                    'route_name' => 'privilages.show',
                    'icon_image' => NULL,
                    'icon_font' => 'fa fa-dropbox',
                    'parent_id' => 'settings',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => 6,
                    'protected' => 0,
                    'description' => NULL,
                    'attributes' => NULL,
                ],
            ]));
        });
    }
}

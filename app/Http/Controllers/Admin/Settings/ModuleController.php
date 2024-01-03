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

use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\UtilityServices;
use App\Http\Controllers\Controller;
use Cache;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ModuleController
 * @package App\Http\Controllers\Admin\Settings
 */
class ModuleController extends Controller
{
    /** show modules
     *
     * @param ModuleServices $moduleServices
     * @return Factory
     */
    function index(ModuleServices $moduleServices)
    {
        $data = [
            'title' => _t('settings.Module_Management'),
            'heading_text' => _t('settings.Module_Management'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('settings.Settings') => 'admin.module',
                _t('settings.Module_Management') => 'admin.module'
            ],
            'headScripts' => [
                asset('global/plugins/dropzone/dropzone.min.js'),
                asset('global/plugins/progressbar.min.js'),
                asset('global/plugins/bootstrap-select/js/bootstrap-select.min.js')
            ],
            'styles' => [
                asset('global/plugins/dropzone/dropzone.min.css'),
                asset('global/plugins/dropzone/basic.min.css'),
                asset('global/plugins/bootstrap-select/css/bootstrap-select.css'),
            ],
            'pools' => collect($moduleServices->getPools(true)),
            'modules' => $moduleServices->getModules()
        ];

        return view('Admin.Settings.module', $data);
    }

    /**
     * @param ModuleServices $moduleServices
     * @return Factory|\Illuminate\View\View
     */
    function moduleList(ModuleServices $moduleServices)
    {
        $data['modules'] = $moduleServices->getModules();

        return view('Admin.Settings.Partials.Module.list', $data);
    }

    /**
     * Module Configure page
     *
     * @param integer $id
     * @return string|view
     */
    function configure($id)
    {
        return callModule((int)$id, 'adminConfig', ['id' => (int)$id]);
    }

    /**
     * Save module Data
     *
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @return bool|JsonResponse
     */
    function saveData(Request $request, ModuleServices $moduleServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        if (!$request->input('module_id')) return $this->throwJsonError();

        $module = $moduleServices->getModuleById($request->input('module_id'));

        return callModule($module->registry['slug'], 'saveData');
    }

    /**
     * Throw Json Error
     *
     * @param string $message
     * @return JsonResponse
     */
    function throwJsonError($message = '')
    {
        $message = $message ?: 'This action not allowed...';

        return response()->json(['status' => false, 'error' => $message], 422);
    }

    /**
     * install module
     *
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function install(Request $request, ModuleServices $moduleServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $parts = explode('-', $request->input('slug'));
        $pool = $parts[0];
        $slug = isset($parts[1]) ? $parts[1] : '';
        $dispatch = ['pool' => $pool, 'slug' => $slug];

        try {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'module_installed', 'data' => $slug,'on_user_id' =>loggedId()]);
            return $this->throwJsonSuccess($moduleServices->install($dispatch));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * Throw Json success
     *
     * @param bool $data
     * @return JsonResponse
     */
    function throwJsonSuccess($data = false)
    {
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    /**
     * delete menu by id
     *
     * @param Request|object $request
     * @param ModuleServices $moduleServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function uninstall(Request $request, ModuleServices $moduleServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        try {
            if ($module = getModule((INT)$request->input('id')))
                app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'module_uninstalled', 'data' => $module->getRegistry(),'on_user_id' =>loggedId()]);
            return $this->throwJsonSuccess($moduleServices->uninstall((INT)$request->input('id')));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * activate module
     *
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function activate(Request $request, UtilityServices $utilityServices)
    {
        if (isDemoVersion()) {
            return response("You can't manage modules in demo mode", 403);
        }

        try {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'module_activated', 'data' => getModule((INT)$request->input('id'))->getRegistry(),'on_user_id' =>loggedId()]);

            Cache::forget('leftMenuCache');
            Cache::forget('hierarchicalLeftMenus');

            return $this->throwJsonSuccess(getModule((INT)$request->input('id'))->activate());
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * deactivate module
     *
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function deactivate(Request $request, UtilityServices $utilityServices)
    {
        if (isDemoVersion()) {
            return response("You can't manage modules in demo mode", 403);
        }

        try {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'module_deactivated', 'data' => getModule((INT)$request->input('id'))->getRegistry(),'on_user_id' =>loggedId()]);

            Cache::forget('leftMenuCache');
            Cache::forget('hierarchicalLeftMenus');

            return $this->throwJsonSuccess(getModule((INT)$request->input('id'))->deactivate());
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * delete menu by id
     *
     * @param Request|object $request
     * @param ModuleServices $moduleServices
     * @return array|JsonResponse|string
     * @throws Exception
     */
    function upload(Request $request, ModuleServices $moduleServices)
    {
        switch ($request->action) {
            case 'checkIntegrity':
                return $moduleServices->checkIntegrity($request);
                break;
            case 'processModule':
                return $moduleServices->processModuleArchive($request->input('install'));
                break;
            default:
                $path = $request->file('module')->store('moduleTemp');
                return response()->json(['key' => $path]);
                break;
        }
    }
}

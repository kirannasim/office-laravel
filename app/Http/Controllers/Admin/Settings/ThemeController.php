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

use App\Blueprint\Facades\ThemeServer;
use App\Blueprint\Interfaces\Theme\ThemeBasicAbstract;
use App\Blueprint\Services\ThemeServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\Theme;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ThemeController
 * @package App\Http\Controllers\Admin\Settings
 */
class ThemeController extends Controller
{
    /**
     * Menu customization page index
     * @param ThemeServices $themeServices
     * @return Factory|View
     */
    function index(ThemeServices $themeServices)
    {
        $data['title'] = _t('settings.Theme_Management');
        $data['heading_text'] = _t('settings.Theme_Management');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _t('settings.Settings') => 'admin.themes',
            _t('settings.Theme_Management') => 'admin.themes'
        ];

        $scripts = [
            asset('global/plugins/dropzone/dropzone.min.js'),
            asset('global/plugins/progressbar.min.js'),
            asset('global/plugins/bootstrap-select/js/bootstrap-select.min.js'),
        ];
        $styles = [
            asset('global/plugins/dropzone/dropzone.min.css'),
            asset('global/plugins/dropzone/basic.min.css'),
            asset('global/plugins/bootstrap-select/css/bootstrap-select.css'),
        ];
        $data['styles'] = $styles;
        $data['headScripts'] = $scripts;
        $data['themes'] = $themeServices->getThemes(true);
        $data['activeTheme'] = $themeServices->getActiveTheme()->getRegistry()['slug'];
        $data['activeLayout'] = $themeServices->getActiveLayout();

        return view('Admin.Settings.theme', $data);
    }

    /**
     * Module Configure page
     *
     * @param integer $id
     * @param ThemeServices $themeServices
     * @return ThemeBasicAbstract|bool|mixed
     */
    function configure($id, ThemeServices $themeServices)
    {
        $module = $themeServices->getTheme($id);

        return $themeServices->callTheme($module->registry['slug'], 'adminConfig', ['id' => $id]);
    }

    /**
     * Save module Data
     *
     * @param Request $request
     * @param ThemeServices $themeServices
     * @return bool|JsonResponse
     */
    function saveData(Request $request, ThemeServices $themeServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        if (!$request->input('module_id')) return $this->throwJsonError();

        $module = $themeServices->getTheme($request->input('module_id'));

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
     * install theme
     *
     * @param Request $request
     * @param ThemeServices $themeServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function install(Request $request, ThemeServices $themeServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $parts = explode('-', $request->input('slug'));
        $pool = $parts[0];
        $slug = isset($parts[1]) ? $parts[1] : '';
        $dispatch = ['pool' => $pool, 'slug' => $slug];

        try {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'theme_installed',
                'data' => $themeServices->getTheme($slug)->getRegistry(),
                'on_user_id' =>loggedId()
            ]);
            return $this->throwJsonSuccess($themeServices->install($dispatch));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * Throw Json Error description]
     * @param bool $data
     * @return JsonResponse
     */
    function throwJsonSuccess($data = false)
    {
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    /**
     * @param Request $request
     * @param ThemeServices $themeServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function uninstall(Request $request, ThemeServices $themeServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        try {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'theme_uninstalled',
                'data' => $themeServices->getTheme((INT)$request->input('id'))->getRegistry(),
                'on_user_id' =>loggedId()
            ]);
            return $this->throwJsonSuccess($themeServices->uninstall((INT)$request->input('id')));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * activate module
     *
     * @param Request $request
     * @return JsonResponse response of ajax updation request
     */
    function activate(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        try {
            return $this->throwJsonSuccess(ThemeServer::activate((INT)$request->input('id')));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * deactivate module
     *
     * @param Request $request
     * @return JsonResponse
     */
    function deactivate(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        try {
            return $this->throwJsonSuccess(ThemeServer::deactivate($request->input('id')));
        } catch (Exception $e) {
            return $this->throwJsonError($e->getMessage());
        }
    }

    /**
     * delete menu by id
     * @param request object $request request object
     * @param ThemeServices $themeServices
     * @return array|JsonResponse|string
     * @throws Exception
     */
    function upload(Request $request, ThemeServices $themeServices)
    {
        switch ($request->input('action')) {
            case 'checkIntegrity':
                return $themeServices->checkIntegrity($request);
                break;

            case 'processTheme':
                return $themeServices->processThemeArchive($request->input('install'));
                break;

            default:
                $path = $request->file('theme')->store('themeTemp');
                return response()->json(['key' => $path]);
                break;
        }
    }

    /**
     * Preview theme
     * @param Request $request
     * @return JsonResponse [type] [description]
     */
    function preview(Request $request)
    {
        $request->flashOnly(['layout', 'theme']);

        return response()->json(['status' => true]);
    }

    /**
     * Set theme layout
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function saveLayout(Request $request, UtilityServices $utilityServices)
    {
        if ($request->has('theme')) Theme::setThemeActive($request->input('theme'));

        $activeTheme = Theme::activeTheme();

        if ($request->has('layout')) $activeTheme->layout = $request->input('layout');

        $activeTheme->save();

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'theme_changed','on_user_id' =>loggedId()]);

        return response()->json(['status' => true]);
    }
}
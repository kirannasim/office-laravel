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

use App\Blueprint\Services\ConfigServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Traits\Validators;
use App\Eloquents\ConfigField;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ConfigFieldsController
 * @package App\Http\Controllers\Admin\Settings
 */
class ConfigFieldsController extends Controller
{
    use Validators;

    /**
     * Index function
     *
     * @param ConfigServices $configServices
     * @param ModuleServices $moduleServices
     * @return view
     */
    function index(ConfigServices $configServices, ModuleServices $moduleServices)
    {
        $data = [
            'title' => _t('settings.custom_field_management'),
            'heading_text' => _t('settings.custom_field_management'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('settings.Settings') => 'admin.cron',
                _t('settings.custom_field_management') => 'config.fields'
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'),
                asset('global/plugins/jquery-minicolors/jquery.minicolors.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'),
                asset('global/plugins/bootstrap-colorpicker/css/colorpicker.css'),
                asset('global/plugins/jquery-minicolors/jquery.minicolors.css'),
            ],
            'fields' => $configServices->configFields(),
            'fieldGroups' => $configServices->configFieldGroups(),
            'fieldTags' => $configServices->configFieldTags(),
            'modulePools' => $moduleServices->getPools(),
        ];

        return view('Admin.Settings.configFields', $data);
    }

    /**
     * @param Request $request
     * @param ConfigServices $configServices
     * @param ModuleServices $moduleServices
     * @return Factory|\Illuminate\View\View
     */
    function fieldForm(Request $request, ConfigServices $configServices, ModuleServices $moduleServices)
    {
        $data = [
            'field' => $field = ConfigField::find($request->input('field')),
            'action' => $request->input('action', $field ? 'update' : ''),
            'conditionalFields' => $configServices->configFields([
                'fieldType' => ['select', 'radio']
            ]),
            'fieldGroups' => $configServices->configFieldGroups(),
            'fieldTags' => $configServices->configFieldTags(),
            'modulePools' => $moduleServices->getPools(),
            'validationRules' => $this->validatorRules()
        ];

        return view('Admin.Settings.Partials.Config.fieldForm', $data);
    }

    /**
     * Save field Tag
     *
     * @param Request $request request object
     * @param ConfigServices $configServices
     * @return bool|JsonResponse
     * @throws Exception
     */
    function tagHandler(Request $request, ConfigServices $configServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $action = $request->input('action');

        switch ($action) {
            case 'save':
                $this->validate($request, [
                    'title' => 'required|unique:config_field_tags|min:3',
                    'description' => 'required|min:10'
                ]);
                $configServices->saveFieldTag($request);
                break;
            case 'update':
                return $configServices->updateFieldTag($request);
                break;
            case 'delete':
                $configServices->deleteFieldTag($request);
                break;
            case 'query':
                return response()->json($configServices->queryFieldTag($request));
                break;
            default:
                response()->json(['error' => 'Action not allowed !']);
                break;
        }

        return response()->json(['status' => true]);
    }

    /**
     * Save field Group
     *
     * @param Request $request request object
     * @param ConfigServices $configServices
     * @return bool|ResponseFactory|JsonResponse|Response
     * @throws Exception
     */
    function groupHandler(Request $request, ConfigServices $configServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $rules = [
            'action' => 'required',
        ];
        $attributes = [];
        $action = $request->input('action');

        if (($action == 'save') || ($action == 'update')) {
            $rules['title.' . currentLocal()] = 'required';
            $attributes['title.' . currentLocal()] = 'Title for current language';
        }

        $this->validate($request, $rules, [], $attributes);

        switch ($action) {
            case 'save':
                $configServices->saveFieldGroup($request);
                break;
            case 'update':
                return $configServices->updateFieldGroup($request);
                break;
            case 'delete':
                return $configServices->deleteFieldGroup($request);
                break;
            case 'query':
                return response()->json($configServices->queryFieldGroup($request));
                break;
            default:
                response()->json(['error' => 'Action not allowed !']);
                break;
        }

        return response()->json(['status' => true]);
    }

    /**
     * Field Handler Function to handle all field actions
     *
     * @param Request $request request object
     * @param ConfigServices $configServices
     * @return bool|ResponseFactory|JsonResponse|Response
     * @throws Exception
     */
    function fieldHandler(Request $request, ConfigServices $configServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $rules = [
            'action' => 'required',
        ];
        $action = $request->input('action');

        if (($action == 'save') || ($action == 'update')) {
            $rules['label'] = 'required|min:2';
            $rules['field_group'] = 'required|exists:config_field_groups,id';
        }

        $this->validate($request, $rules);

        switch ($action) {
            case 'save':
                $configServices->saveField($request);
                break;
            case 'update':
                return $configServices->updateField($request);
                break;
            case 'delete':
                return $configServices->deleteField($request);
                break;
            case 'query':
                return response()->json($configServices->queryField($request));
                break;
            default:
                response()->json(['error' => 'Action not allowed !']);
                break;
        }

        return response()->json(['status' => true]);
    }
}

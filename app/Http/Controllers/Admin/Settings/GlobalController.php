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

use App\Blueprint\Facades\ConfigServer;
use App\Blueprint\Services\ConfigServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\Config;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class GlobalController
 * @package App\Http\Controllers\Admin\Settings
 */
class GlobalController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'title' => _t('settings.Global_Settings'),
            'heading_text' => _t('settings.Global_Settings'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('index.dashboard') => 'admin.home'
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/summernote/summernote.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('global/plugins/summernote/summernote.css'),
            ],
            'tag' => 'system-settings',
            'configOptions' => [
                'tag' => 'system_settings',
                'defaultValueMethod' => 'post',
            ],
        ];

        return view('Admin.Settings.global', $data);
    }

    /**
     * show sub view of settings
     *
     * @param $type
     * @return mixed
     */
    function getConfigView($type)
    {
        return $this->$type();
    }

    /**
     * Save config
     *
     * @param Request $request collection
     * @param ConfigServices $config
     * @param UtilityServices $utilityServices
     * @return bool
     */
    function saveConfig(Request $request, ConfigServices $config, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        list($rules, $attributes) = $config->fieldValidationPreProcess($request);
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($attributes);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $entries = [];

        foreach (array_merge($entries, $config->extractCustomFields($request->all())) as $entry) {
            Config::updateOrCreate(['meta_key' => $entry['meta_key'], 'group' => $entry['group']], $entry);
        };

        return app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'settings_updated','on_user_id' =>loggedId()]);
    }

    /**
     * show email subview
     *
     * @return Factory|View
     */
    function email()
    {
        $data = ConfigServer::getConfigData('email');
        $data['meta_value'] = unserialize($data['meta_value']);

        return view('Admin.Settings.email', $data);
    }

    /**
     * show payout subview
     *
     * @return Factory|View
     */
    function payout()
    {
        $data = ConfigServer::getConfigData('payout');
        $data['meta_value'] = unserialize($data['meta_value']);

        return view('Admin.Settings.payout', $data);
    }

    /**
     * show company sub view
     *
     * @return Factory|View
     */
    function companyInfo()
    {
        $data = ConfigServer::getConfigData('companyinfo');
        $data['meta_value'] = unserialize($data['meta_value']);

        return view('Admin.Settings.companyinfo', $data);
    }

    /**
     * show cache sub view
     */
    function cache()
    {
        $data = ConfigServer::getConfigData('cache');
        $data['meta_value'] = unserialize($data['meta_value']);

        return view('Admin.Settings.cache', $data);
    }
}

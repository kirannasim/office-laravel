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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class GeneralController
 * @package App\Http\Controllers\Admin\Settings
 */
class GeneralController extends Controller
{
    /**
     * general view of settings
     *
     * @return type view
     */
    public function index()
    {
        $data = [
            'scripts' => [
                themeAssetUrl('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                themeAssetUrl('global/plugins/jquery-validation/js/additional-methods.min.js'),
                themeAssetUrl('global/plugins/tinymce/tinymce.min.js'),
                themeAssetUrl('global/plugins/ladda/spin.min.js'),
                themeAssetUrl('global/plugins/ladda/ladda.min.js'),
            ],
            'styles' => [
                themeAssetUrl('global/plugins/ladda/ladda-themeless.min.css')
            ],
            'active_settings' => ConfigServer::getallActiveSettings()->all()
        ];

        return view('Admin.Settings.general', $data);
    }

    /**
     * show sub view of settings
     *
     * @param type $type string
     * @return type view
     */
    function getConfigView($type)
    {
        return $this->$type();
    }

    /**
     * save subview datas
     *
     * @param Request $request collection
     * @return type boolean
     */
    function saveConfig(Request $request)
    {
        $config_data['status'] = 0;
        if ($request->input('status'))
            $config_data['status'] = 1;
        $config_data['meta_value'] = serialize($request->input());
        return ConfigServer::saveConfigData($request->input('config_id'), $config_data);
    }

    /**
     * show email subview
     *
     * @return type view
     */
    function email()
    {
        $data = ConfigServer::getConfigData('email');
        $data['meta_value'] = unserialize($data['meta_value']);
        return view('Admin.Settings.email', $data);
    }

    /**
     * show payout subview
     * @return type view
     */
    function payout()
    {
        $data = ConfigServer::getConfigData('payout');
        $data['meta_value'] = unserialize($data['meta_value']);
        return view('Admin.Settings.payout', $data);
    }

    /**
     * shoe company sub view
     * @return type view
     */
    function companyinfo()
    {
        $data = ConfigServer::getConfigData('companyinfo');
        $data['meta_value'] = unserialize($data['meta_value']);
        return view('Admin.Settings.companyinfo', $data);
    }

    /**
     * show cache sub view
     * @return type view
     */
    function cache()
    {
        $data = ConfigServer::getConfigData('cache');
        $data['meta_value'] = unserialize($data['meta_value']);
        return view('Admin.Settings.cache', $data);
    }

}

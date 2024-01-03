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

namespace App\Components\Modules\System\MLM\ModuleCore\Traits;

use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;

/**
 * Trait Hooks
 * @package App\Components\Modules\System\MLM\MduleCore\Traits
 */
trait Hooks
{
    /**
     * Registers required hooks
     *
     * @return void
     */
    function hooks()
    {
        registerAction('postRegistration', function ($data) {
            if (!$data->get('result')['user']->repoData) {
                $plugin = app(Plugins::class);
                return $plugin->insertToPending($data->get('result')['user']->id, 'registration', 0, getPackageInfo($data->get('result')['user']->package_id)['price']);
            }
        }, 'registration', 0);

        registerAction('postPackageUpgrade', function ($data) {
            if (!$data->get('result')['user']->repoData) {
                $plugin = app(Plugins::class);
                return $plugin->insertToPending($data->get('result')['user']->id, 'upgrade', $data->get('previousPackage')->id);
            }
        }, 'package_upgrade', 0);

        registerFilter('dataTruncate', function ($data, $args) {

        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
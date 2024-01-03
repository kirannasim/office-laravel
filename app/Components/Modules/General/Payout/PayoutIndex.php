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

namespace App\Components\Modules\General\Payout;

use App\Blueprint\Facades\ModuleServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\Payout\ModuleCore\Traits\Boot;
use App\Components\Modules\General\Payout\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\Payout\ModuleCore\Traits\Routes;

/**
 * Class PayoutIndex
 * @package App\Components\Modules\General\Payout
 */
class PayoutIndex extends BasicContract
{
    use Routes, Boot, Hooks;

    /**
     * handle module installations
     *
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module un-installation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $data = [];
        $config = $this->getModuleData(true);
        $data['config'] = $config->count() ? $config : collect([]);
        $scope = session('theScope') ?: 'user';
        $data['breadcrumbs'] = ["home" => "$scope.home"];
        $data['moduleId'] = $this->moduleId;

        return view('General.Payout.Views.adminConfig', $data);
    }

    /**
     * Validation Rules for Payout Config
     *
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data' => 'array|min:1',
        ];
    }
}

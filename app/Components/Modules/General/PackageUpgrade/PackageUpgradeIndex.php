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

namespace App\Components\Modules\General\PackageUpgrade;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits\Routes;
use App\Eloquents\ModuleData;
use Illuminate\View\View;

/**
 * Class PackageUpgradeIndex
 * @package App\Components\Modules\General\PackageUpgrade
 */
class PackageUpgradeIndex extends BasicContract
{
    use Routes, Hooks;

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect([
            'price_settings' => 'package_amount'
        ]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'styles' => [],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'config' => $config,
            'moduleId' => $this->moduleId
        ];

        return view('General.PackageUpgrade.Views.adminConfig', $data);
    }

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
}
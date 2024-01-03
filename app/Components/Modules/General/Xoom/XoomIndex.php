<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Xoom;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\Xoom\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\Xoom\ModuleCore\Traits\Routes;
use App\Blueprint\Services\PackageServices;
use App\Eloquents\ModuleData;
use Illuminate\View\View;

/**
 * Class XoomIndex
 * @package App\Components\Modules\General\Xoom
 */
class XoomIndex extends BasicContract
{

    use Routes, Hooks;

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect([
            'XOOM_API_ENTERPRISE_IDENTIFIER' => '',
            'XOOM_API_USERNAME' => '',
            'XOOM_API_PASSWORD' => '',
            'XOOM_API_CLIENT_ID' => '',
            'XOOM_API_CLIENT_SECRET' => '',
            'packages_map' => [],
        ]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);


        $data = [
            'styles' => [],
            'scripts' => [],
            'config' => $config,
            'moduleId' => $this->moduleId,
            'packages' => (new PackageServices)->getRegistrationPackages(),
        ];

        return view('General.Xoom.Views.adminConfig', $data);
    }

    /**
     * handle module installations
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module uninstallation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }
}

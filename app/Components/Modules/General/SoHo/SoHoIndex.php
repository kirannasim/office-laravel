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

namespace App\Components\Modules\General\SoHo;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\SoHo\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\SoHo\ModuleCore\Traits\Routes;
use App\Blueprint\Services\PackageServices;
use App\Eloquents\ModuleData;
use Illuminate\View\View;

/**
 * Class SoHoIndex
 * @package App\Components\Modules\General\SoHo
 */
class SoHoIndex extends BasicContract
{

    use Routes, Hooks;

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

    /**
     * @return string
     */
    function getConfigRoute()
    {
        //return scopeRoute('addoncart.management.index');
    }
}

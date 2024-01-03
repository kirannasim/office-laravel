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

namespace App\Components\Modules\Security\AdvancedPrivileges;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Traits\Hooks;
use App\Components\Modules\Security\AdvancedPrivileges\ModuleCore\Traits\Routes;
use App\Blueprint\Interfaces\Module\SecurityModuleInterface;

/**
 * Class AdvancedPrivilegesIndex
 * @package App\Components\Modules\Security\AdvancedPrivileges
 */
class AdvancedPrivilegesIndex extends BasicContract implements SecurityModuleInterface
{
    use Routes, Hooks;

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

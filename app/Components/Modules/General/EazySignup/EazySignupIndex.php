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

namespace App\Components\Modules\General\EazySignup;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\EazySignup\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\EazySignup\ModuleCore\Traits\Routes;

/**
 * Class EazySignupIndex
 * @package App\Components\Modules\General\EazySignup
 */
class EazySignupIndex extends BasicContract
{
    use Hooks, Routes;

    /**
     * @return string
     */
    function getConfigRoute()
    {
        return;
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

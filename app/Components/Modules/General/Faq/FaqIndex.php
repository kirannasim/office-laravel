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

namespace App\Components\Modules\General\Faq;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\Faq\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\Faq\ModuleCore\Traits\Routes;

/**
 * Class FaqIndex
 * @package App\Components\Modules\General\Faq
 */
class FaqIndex extends BasicContract
{

    use Routes, Hooks;

    /**
     * Register providers
     */
    function providers()
    {

    }

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $data['moduleId'] = $this->moduleId;
        return view('General.Faq.Views.adminConfig', $data);
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

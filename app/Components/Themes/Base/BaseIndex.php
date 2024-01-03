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

namespace App\Components\Themes\Base;

use App\Blueprint\Interfaces\Theme\ThemeBasicAbstract as BasicContract;

/**
 * Class BaseIndex
 * @package App\Components\Themes\Base
 */
class BaseIndex extends BasicContract
{
    /**
     * give themes registry information
     */
    function registry()
    {
        $registry = file_exists(__dir__ . '/ThemeRegistry.php') ? require('ThemeRegistry.php') : [];

        return $registry;
    }

    /**
     * Register providers
     */
    function providers()
    {

    }

    /**
     * Registers hooks
     */
    function hooks()
    {

    }

    /**
     * handle admin settings
     */

    function adminConfig()
    {

    }

    /**
     * handle module installations
     * @return void
     */

    function install()
    {
        //ThemeCore\Schema\setup::install();
    }

    /**
     * handle module uninstallation
     */

    function uninstall()
    {
        //ThemeCore\Schema\setup::uninstall();
    }
}

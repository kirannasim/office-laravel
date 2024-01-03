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

/**
 * Created by PhpStorm.
 * User: Hybrid MLM Software
 * Date: 6/10/2018
 * Time: 3:46 PM
 */

namespace App\Blueprint\Interfaces\Core;


/**
 * Interface ComponentInterface
 * @package App\Blueprint\Interfaces\Core
 */
interface ComponentInterface
{
    /**
     * Component install action
     *
     * @return boolean status of installation
     */
    public function install();

    /**
     * Component install action
     *
     * @return boolean status of uninstallation
     */
    public function uninstall();

    /**
     * Component install action
     *
     * @return boolean status of installation
     */
    public function activate();

    /**
     * Component install action
     *
     * @return boolean status of un-installation
     */
    public function deactivate();

    /**
     * Component registry information
     *
     * @return boolean
     */
    public function getRegistry();

    /**
     * register providers
     */
    public function providers();
}

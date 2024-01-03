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

namespace App\Blueprint\Interfaces\Module;

use App\Blueprint\Interfaces\Core\ComponentInterface;

/**
 * Interface ModuleBasicInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface ModuleBasicInterface extends ComponentInterface
{
    /**
     * admin config page
     */
    public function adminConfig();
}

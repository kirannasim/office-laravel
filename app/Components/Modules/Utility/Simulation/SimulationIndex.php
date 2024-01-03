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

namespace App\Components\Modules\Utility\Simulation;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\UtilityModuleInterface;
use App\Components\Modules\Utility\Simulation\ModuleCore\Traits\Hooks;
use App\Components\Modules\Utility\Simulation\ModuleCore\Traits\Routes;


/**
 * Class SimulationIndex
 * @package App\Components\Modules\Utility\SimulationIndex
 */
class SimulationIndex extends BasicContract implements UtilityModuleInterface
{
    use Routes, Hooks;


    function getConfigRoute()
    {

    }

}

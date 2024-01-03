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

namespace App\Components\Modules\Report\TreeList;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\TreeList\ModuleCore\Traits\Routes;
use App\Components\Modules\Report\TreeList\ModuleCore\Traits\Hooks;

/**
 * Class KycIndex
 * @package App\Components\Modules\General\Report
 */
class TreeListIndex extends BasicContract Implements ReportModuleInterface
{
    use Routes, Hooks;
}

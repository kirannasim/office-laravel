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

namespace App\Components\Modules\Report\JoiningReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\JoiningReport\ModuleCore\Traits\Routes;
use App\Components\Modules\Report\JoiningReport\ModuleCore\Traits\Hooks;


/**
 * Class JoiningReportIndex
 * @package App\Components\Modules\Report\JoiningReport
 */
class JoiningReportIndex extends BasicContract implements ReportModuleInterface
{
    use Routes, Hooks;
}

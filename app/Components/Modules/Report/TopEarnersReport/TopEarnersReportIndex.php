<?php


namespace App\Components\Modules\Report\TopEarnersReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\TopEarnersReport\ModuleCore\Traits\Hooks;
use App\Components\Modules\Report\TopEarnersReport\ModuleCore\Traits\Routes;

/**
 * Class TopEarnersReportIndex
 * @package App\Components\Modules\Report\TopEarnersReport
 */
class TopEarnersReportIndex extends BasicContract implements ReportModuleInterface
{
    use Routes, Hooks;
}

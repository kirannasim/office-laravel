<?php

namespace App\Components\Modules\Report\FoundersLaunchReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Traits\Hooks;
use App\Components\Modules\Report\FoundersLaunchReport\ModuleCore\Traits\Routes;

/**
 * Class FoundersLaunchReportIndex
 * @package App\Components\Modules\Report\FoundersLaunchReport
 */
class FoundersLaunchReportIndex extends BasicContract implements ReportModuleInterface
{
    use Routes, Hooks;

    /**
     * @return string|void
     */
    function getConfigRoute()
    {

    }
}

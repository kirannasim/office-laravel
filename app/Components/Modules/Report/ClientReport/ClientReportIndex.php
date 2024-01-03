<?php

namespace App\Components\Modules\Report\ClientReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\ClientReport\ModuleCore\Traits\Hooks;
use App\Components\Modules\Report\ClientReport\ModuleCore\Traits\Routes;

/**
 * Class ClientReportIndex
 * @package App\Components\Modules\Report\ClientReport
 */
class ClientReportIndex extends BasicContract implements ReportModuleInterface
{
    use Routes, Hooks;

    /**
     * @return string|void
     */
    function getConfigRoute()
    {

    }
}

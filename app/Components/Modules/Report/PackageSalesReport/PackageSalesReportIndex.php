<?php

namespace App\Components\Modules\Report\PackageSalesReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits\Hooks;
use App\Components\Modules\Report\PackageSalesReport\ModuleCore\Traits\Routes;

/**
 * Class PackageSalesReportIndex
 * @package App\Components\Modules\Report\PackageSalesReport
 */
class PackageSalesReportIndex extends BasicContract implements ReportModuleInterface
{
    use Hooks, Routes;

    /**
     * @return string|void
     */
    function getConfigRoute()
    {

    }
}
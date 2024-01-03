<?php
/**
 * Created by PhpStorm.
 * User: HtCodingM
 * Date: 3/31/2020
 * Time: 6:01 PM
 */

namespace App\Components\Modules\Report\InfluencersReport;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Components\Modules\Report\InfluencersReport\ModuleCore\Traits\Routes;
use App\Components\Modules\Report\InfluencersReport\ModuleCore\Traits\Hooks;


class InfluencersReportIndex  extends BasicContract implements ReportModuleInterface
{
    use Routes, Hooks;

}
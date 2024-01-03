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

namespace App\Components\Modules\Layout\BinaryInfoBlocks;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\Layout\BinaryInfoBlocks\ModuleCore\Traits\Hooks;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

/**
 * Class BinaryInfoBlocksIndex
 * @package App\Components\Modules\Layout\BinaryInfoBlocks
 */
class BinaryInfoBlocksIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks;

    /**
     * @param Request $request
     * @param BinaryServices $binaryServices
     * @return Factory|View
     * @throws Throwable
     */
    function dashboardBinaryInfoTile(Request $request, BinaryServices $binaryServices)
    {
        if (strtolower(getScope()) != 'user') return '';

        $data = [
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ],
            'binaryInfo' => $binaryServices->getPoints(collect([
                'userId' => $logegdId = loggedId(),
                'fullStats' => true
            ]))->first(),
            'totalPair' => $binaryServices->getPairCount(collect([
                'fromDate' => loggedUser()->created_at,
                'toDate' => date('Y-m-d H:i:s'),
                'user' => ['id' => $logegdId]
            ]))
        ];

        return view('Layout.BinaryInfoBlocks.Views.dashboardTile', $data)->render();
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}
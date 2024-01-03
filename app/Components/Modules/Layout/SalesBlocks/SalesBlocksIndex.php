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

namespace App\Components\Modules\Layout\SalesBlocks;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Services\OrderServices;
use App\Components\Modules\Layout\SalesBlocks\ModuleCore\Traits\Hooks;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SalesBlocksIndex
 * @package App\Components\Modules\Layout\SalesBlocks
 */
class SalesBlocksIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks;

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param OrderServices $orderServices
     * @return Factory|View
     */
    function salesDetailedGraph(IndexController $controller, Request $request, OrderServices $orderServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $packageOrders = $orderServices->getOrders($options->merge([
            'orderType' => 'package'
        ]));
        $orderTotals = $orderServices->getOrderTotals($options->merge([
            'orderType' => 'package'
        ]))->groupBy('title');
        $groupedTotal = $orderTotals->get()->groupBy(function ($value) {
            return str_replace(' ', '_', $value->title);
        });
        $orderTotalGraph = $xAxises = [];
        $packageGraph = $controller->prepareShortGraphData($packageOrders->get(), $groupBy = $options->get('groupBy'), 'totalAmount');

        if ($packageGraph->keys()->count()) array_push($xAxises, $packageGraph->keys());

        $totalLabels = $orderTotals->pluck('title')->unique();

        foreach ($totalLabels as $key => $value) {
            $slug = str_replace(' ', '_', $value);
            $orderTotalGraph[$slug] = $controller->formatToArrayForGraph($totalGraph = $controller->prepareShortGraphData($groupedTotal->get($slug), $options->get('groupBy')));

            if ($totalGraph->keys()->count()) array_push($xAxises, ...$totalGraph->keys());
        }

        $data = [
            'filterBy' => $options->get('filterBy', 'month'),
            'bizBalance' => callModule('Wallet-BusinessWallet', 'getBalance'),
            'packageGraph' => $controller->formatToArrayForGraph($packageGraph),
            'orderTotalGraph' => $orderTotalGraph,
            'packageSum' => $packageOrders->get()->sum('totalAmount'),
            'xAxises' => $controller->sortData(collect($xAxises), $groupBy),
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ]
        ];

        return view('Layout.SalesBlocks.Views.salesDetailedGraph', $data);
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}
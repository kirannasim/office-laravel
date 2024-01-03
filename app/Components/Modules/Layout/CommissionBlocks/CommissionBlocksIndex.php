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

namespace App\Components\Modules\Layout\CommissionBlocks;

use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Services\CommissionServices;
use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Layout\CommissionBlocks\ModuleCore\Traits\Hooks;
use App\Http\Controllers\Admin\IndexController;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

/**
 * Class CommissionBlocksIndex
 * @package App\Components\Modules\Layout\CommissionBlocks
 */
class CommissionBlocksIndex extends BasicContract implements LayoutModuleInterface
{
    use Hooks;

    /**
     * @param IndexController $controller
     * @param Request $request
     * @param CommissionServices $commissionServices
     * @param ModuleServices $moduleServices
     * @return Factory|View
     * @throws Throwable
     */
    function commissionDetailedGraph(IndexController $controller, Request $request, CommissionServices $commissionServices, ModuleServices $moduleServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
        ]);

        if (strtolower(getScope()) == 'user') $filters->put('user', loggedId());

        $options = $filters->merge($request->input('filters'))
            ->filter(function ($value) {
                return $value;
            })
            ->map(function ($value, $key) {
                if ($key == 'user') return [$value, 'payee'];

                return $value;
            });
        $xAxises = $graphData = [];
        $commissions = array_map(function ($value) use ($options, $commissionServices) {
            $transactions = $commissionServices->getTransactions($value, $options->all())->get();
            $value->transactions = $transactions;

            return $value;
        }, $moduleServices->getCommissionPool(true));

        $totalAmount = 0;

        foreach ($commissions as $commission) {
            $graphData[] = [
                'name' => $commission->registry['name'],
                'key' => $commission->registry['key'],
                'graphType' => 'bar',
                'color' => randColor(),
                'graph' => $controller->formatToArrayForGraph($graph = $controller->prepareShortGraphData($commission->transactions, $options->get('groupBy')))
            ];
            $totalAmount += $commission->transactions->sum('total');

            if ($graph->keys()->count()) array_push($xAxises, ...$graph->keys());
        }

        $data = [
            'commissions' => $commissions,
            'graphData' => $graphData,
            'filterBy' => $options->get('filterBy', 'month'),
            'scope' => $request->input('filters.user'),
            'xAxises' => $controller->sortData(collect($xAxises), $options->get('groupBy')),
            'totalAmount' => $totalAmount,
            'moduleId' => $this->moduleId,
            'scripts' => [
                $this->addJs('script.js')
            ],
            'styles' => [
                $this->addCss('style.css')
            ]
        ];

        return view('Layout.CommissionBlocks.Views.commissionDetailedGraph', $data)->render();
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }

}
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

namespace App\Http\Controllers\Employee;

use App\Blueprint\Services\MailServices;
use App\Blueprint\Services\UtilityServices;
use App\Blueprint\Traits\Graph\DateTimeFormatter;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Employee
 */
class IndexController extends Controller
{
    use DateTimeFormatter, GraphHelper;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = _t('index.dashboard');
        $data['heading_text'] = _t('index.dashboard');
        $data['breadcrumbs'] = [_t('index.home') => 'employee.home', _t('index.dashboard') => 'employee.home'];
        $data['scripts'] = [
            asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
            asset('global/plugins/chartjs-master/dist/Chart.bundle.min.js'),
            asset('global/plugins/countUpJS/dist/countUp.min.js'),
            asset('global/plugins/clipboard.js-master/dist/clipboard.min.js'),
        ];
        $data['styles'] = [
            asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.css'),
            asset('global/plugins/morris/morris.css'),
            asset('global/plugins/fullcalendar/fullcalendar.min.css'),
            asset('global/plugins/jqvmap/jqvmap/jqvmap.css'),
        ];
        $data['filterBy'] = 'year';

        return view('Employee.Dashboard.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function requestUnit(Request $request)
    {
        if (!$unit = $request->input('unit')) return response('Action not allowed!');

        defineAction('dashboardLayout', 'unitAction', $unit);

        return defineFilter('dashboardLayout', method_exists($this, $unit) ? app()->call([$this, $unit], (array)$request->input('args')) : '', 'unitFilter', $unit);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function businessInfo()
    {
        $data = [];

        return view('Employee.Dashboard.Partials.businessInfo', $data);
    }

    /**
     * @param Request $request
     * @param MailServices $mailServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function mailDetailedGraph(Request $request, MailServices $mailServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
            /*'user' => loggedId()*/
        ]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $graphData = [
            'inbox' => $this->prepareShortGraphData($mailServices->getReceivedMails($options), $groupBy = $options->get('groupBy')),
            'sent' => $this->prepareShortGraphData($mailServices->getSentMails($options), $groupBy),
            'drafts' => $this->prepareShortGraphData($mailServices->getDrafts($options), $groupBy),
            'trashed' => $this->prepareShortGraphData($mailServices->getTrashedMails($options), $groupBy),
        ];
        $xAxises = $totals = [];

        foreach ($graphData as $key => $datum) {
            if ($datum->keys()->count()) array_push($xAxises, ...$datum->keys());

            $totals[$key] = $datum->values()->sum();
            $graphData[$key] = $this->formatToArrayForGraph($datum);
        }

        $data = [
            'filterBy' => $options->get('filterBy', 'month'),
            'scope' => $options->get('user'),
            'graph' => $graphData,
            'totals' => $totals,
            'xAxises' => $this->sortData(collect($xAxises), $groupBy)
        ];

        return view('Employee.Dashboard.Partials.DetailedGraphs.mailStats', $data);
    }

    /**
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function activities(Request $request, UtilityServices $utilityServices)
    {
        $filters = collect([]);
        $options = $filters->merge($request->input('filters'))->filter(function ($value) {
            return $value;
        });
        $data = [
            'activities' => $utilityServices->getActivityHistories($options)->where('user_id', loggedId())->orderBy('created_at', 'desc')->get()->take(10),
        ];

        return view('Employee.Dashboard.Partials.activities', $data);
    }
}
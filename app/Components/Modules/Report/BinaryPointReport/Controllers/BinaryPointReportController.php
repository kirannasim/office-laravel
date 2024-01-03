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

namespace App\Components\Modules\Report\BinaryPointReport\Controllers;

use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\Report\BinaryPointReport\BinaryPointReportIndex as Module;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class BinaryPointReportController
 * @package App\Components\Modules\Report\BinaryPointReport\Controllers
 */
class BinaryPointReportController extends Controller
{

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * get index page of activity report
     *
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        $data['title'] = _mt($this->module->moduleId, 'BinaryPointReport.binary_point_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'BinaryPointReport.binary_point_report');
        $data['breadcrumbs'] = [
            _t('index.home') => getScope() . '.home',
            _mt($this->module->moduleId, 'BinaryPointReport.Report') => getScope() . '.report.binaryPoint',
            _mt($this->module->moduleId, 'BinaryPointReport.binary_point_report') => getScope() . '.report.binaryPoint'
        ];


        return view('Report.BinaryPointReport.Views.BinaryPointReportIndex', $data);
    }

    /**
     * load filters to the index page
     *
     * @return Factory|View
     */
    function filters()
    {
        $data = [
            'default_filter' => [
                'startDate' => Carbon::createFromDate(2019, 8, 1),
                'endDate' => Carbon::tomorrow(),
            ],
        ];
        $data['moduleId'] = $this->module->moduleId;

        return view('Report.BinaryPointReport.Views.Partials.filter', $data);
    }

    /**
     * fetch the report table
     *
     * @param Request $request
     * @param BinaryServices $binaryServices
     * @return Factory|View
     */
    function fetch(Request $request, BinaryServices $binaryServices)
    {
        //Default options
        $defaults = collect(['userId' => loggedId()]);
        $filters = $request->input('filters');
        if(getScope()=='user'){
             $filters['userId'] =  loggedId();
        }
        //$cycledata = app()->call([$this, 'fetchCycleData'], ['filters' => collect($filters)]);
        $options = $defaults->merge(array_filter($filters = $request->input('filters'), function ($value) {
            return $value;
        }));

        if (key_exists('isCredit', $filters) && $filters['isCredit'] != null) $options->put('isCredit', $filters['isCredit']);
        if (key_exists('date', $filters)) {
            $dates = explode(' - ', $filters['date']);
            $options->put('fromDate', $dates[0]);
            $options->put('toDate', $dates[1]);
        }

        $data['binaryPoints'] = $binaryServices->getPoints($options)->paginate($request->input('totalToShow', 20));
        $data['overView'] = $binaryServices->getPoints($options->except(['date', 'isCredit'])->merge(['fullStats' => true]))->first();
        $fromDate = BinaryPoint::min('created_at');
        $data['overView']->cycle = $binaryServices->getPairCount(['user' => loggedId(), 'fromDate' => $fromDate, 'toDate' => Carbon::now()]);
        $data['moduleId'] = $this->module->moduleId;

        return view('Report.BinaryPointReport.Views.Partials.BinaryPointReportTable', $data);
    }

    /**
     * @return Factory|View
     */
    function cycleReportIndex()
    {
        $data = [
            'scripts' => [
            ],
            'styles' => [
                $this->module->getCssPath('style.css'),
            ],
            'title' => _mt($this->module->moduleId, 'BinaryPointReport.cycle_report'),
            'heading_text' => _mt($this->module->moduleId, 'BinaryPointReport.cycle_report'),
            'breadcrumbs' => [
                _t('index.home') => getScope() . '.home',
                _mt($this->module->moduleId, 'BinaryPointReport.Report') => getScope() . '.report.cycleReport',
                _mt($this->module->moduleId, 'BinaryPointReport.cycle_report') => getScope() . '.report.cycleReport'
            ],
        ];

        return view('Report.BinaryPointReport.Views.Partials.CycleReport.index', $data);
    }

    /**
     * @return Factory|View
     */
    function cycleReportFilters()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        return view('Report.BinaryPointReport.Views.Partials.CycleReport.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function cycleReportTable(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'cycleDatas' => app()->call([$this, 'fetchCycleData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 25)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('Report.BinaryPointReport.Views.Partials.CycleReport.reportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchCycleData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return BinaryPoint::when($userId = $filters->get('userId'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->when($start = $filters->get('dateStart'),function ($query) use ($filters,$start){
            $end = $filters->get('dateEnd');
            $start = Carbon::parse($start);
            $end   = Carbon::parse($end);
            $query->whereBetween('created_at', [$start->toDateTimeString(), $end->toDateTimeString()]);
        })->where('pair', '!=', 0)
            ->groupBy('pair_id')->{$method}($pages);
    }
}

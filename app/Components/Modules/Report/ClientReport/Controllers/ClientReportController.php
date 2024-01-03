<?php

namespace App\Components\Modules\Report\ClientReport\Controllers;

use App\Components\Modules\Report\ClientReport\ClientReportIndex as Module;
use App\Components\Modules\Report\ClientReport\ModuleCore\Eloquents\InvestmentClient;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class ClientReportController
 * @package App\Components\Modules\Report\ClientReport\Controllers
 */
class ClientReportController extends Controller
{
    /**
     * ClientReportController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
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
            'moduleId' => $this->module->moduleId,
            'title' => _mt($this->module->moduleId, 'ClientReport.Client_Report'),
            'heading_text' => _mt($this->module->moduleId, 'ClientReport.Client_Report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'ClientReport.Report') => getScope() . ".clientReport.index",
                _mt($this->module->moduleId, 'ClientReport.Client_Report') => getScope() . ".clientReport.index",
            ],
        ];

        return view('Report.ClientReport.Views.clientReportIndex', $data);
    }

    /**
     * @return Factory|View
     */
    function getFilter()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
        ];

        return view('Report.ClientReport.Views.Partials.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function getClients(Request $request)
    {
        $filters = $request->input('filters');
        $user = $request->input('user') ?: loggedId();
        $data = [
            'moduleId' => $this->module->moduleId,
            'clients' => app()->call([$this, 'fetchClients'], ['filters' => collect(['user' => $user, $filters]), 'pages' => $request->input('totalToShow', 25)]),
        ];

        return view('Report.ClientReport.Views.Partials.clientReportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchClients(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return InvestmentClient::when($user = $filters->get('user'), function ($query) use ($user) {
            /** @var Builder $query */
            $query->where('sponsor_id', $user);
        })->when($memberId = $filters->get('memberId'), function ($query) use ($memberId) {
            /** @var Builder $query */
            $query->whereHas('user', function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->where('customer_id', $memberId);
            });
        })->{$method}($pages);
    }
}
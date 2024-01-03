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

namespace App\Components\Modules\Report\EarningReport\Controllers;

use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Components\Modules\Report\EarningReport\EarningReportIndex as Module;
use App\Eloquents\Commission;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


/**
 * Class EarningReportController
 * @package App\Components\Modules\Report\EarningReport\Controllers
 */
class EarningReportController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        $data['title'] = _mt($this->module->moduleId, 'EarningReport.earning_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'EarningReport.earning_report');
        $data['breadcrumbs'] = [
            _t('index.home') => getScope() . '.home',
            _mt($this->module->moduleId, 'EarningReport.Report') => getScope() . '.report.earning',
            _mt($this->module->moduleId, 'EarningReport.earning_report') => getScope() . '.report.earning'
        ];

        return view('Report.EarningReport.Views.EarningReportIndex', $data);
    }

    /**
     * load filters to the index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function filters(ModuleServices $moduleServices)
    {
        $data = [
            'default_filter' => [
                'startDate' => Transaction::min('created_at'),
                'endDate' => Carbon::now()
            ],
            'moduleId' => $this->module->moduleId,
            'commissions' => $moduleServices->getCommissionPool('active'),
            'wallets' => $moduleServices->getWalletPool(true),
        ];

        return view('Report.EarningReport.Views.Partials.filter', $data);
    }

    /**
     * fetch the report table
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function fetch(Request $request)
    {
        $filters = $request->input('filters');
        if ((getScope() !== 'admin') && (getScope() !== 'employee')) {
            $filters['user_id'] = loggedId();
        }

        $data['earnings'] = app()->call([$this, 'fetchEarnings'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]);

        $data['moduleId'] = $this->module->moduleId;

        return view('Report.EarningReport.Views.Partials.EarningReportTable', $data);
    }

    /**
     * fetch sales data
     *
     * @param Collection $filters
     * @param TransactionServices $transactionServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchEarnings(Collection $filters, TransactionServices $transactionServices, $pages = null, $showAll = false)
    {

        if ($filters->get('user_id'))
            $args['user'] = $filters->get('user_id');

        $args['operation'] = TransactionOperation::where('slug', 'commission')->first()->id;

        if ($filters->get('commission')) {
            $args['commission'] = $filters->get('commission');
        }

        if ($filters->get('wallet')) {
            $args['wallet'] = $filters->get('wallet');
        }

        if ($filters->get('date')) {
            $dates = explode(' - ', $filters->get('date'));
            $args['fromDate'] = $dates[0];
            $args['toDate'] = $dates[1];
        }

        if ($filters->get('date_range')) {

            switch ($filters->get('date_range')) {
                case 'today':
                    $args['fromDate'] = Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
                    $args['toDate'] = Carbon::today()->endOfDay()->format('Y-m-d H:i:s');
                    break;
                case 'week':
                    $args['fromDate'] = Carbon::now()->startOfWeek()->format('Y-m-d');
                    $args['toDate'] = Carbon::now()->endOfWeek()->format('Y-m-d');
                    break;
                case 'month':
                    $args['fromDate'] = Carbon::now()->startOfMonth()->format('Y-m-d');
                    $args['toDate'] = Carbon::now()->endOfMonth()->format('Y-m-d');
                    break;
                case 'year':
                    $args['fromDate'] = Carbon::now()->startOfYear()->format('Y-m-d');
                    $args['toDate'] = Carbon::now()->endOfYear()->format('Y-m-d');
                    break;
            }

        }

        $args = collect($args);

        $earnings = Commission::with(['transaction.payerUser', 'transaction.payeeUser', 'transaction.operation'])
            ->whereHas('transaction', static function ($query) use ($args) {
                /** @var Builder $query */
                if ($args->get('user')) {
                    $query->where('payee', $args->get('user'));
                }
                if ($args->get('fromDate')) {
                    $query->whereDate('created_at', '>=', $args->get('fromDate'));
                }
                if ($args->get('toDate')) {
                    $query->whereDate('created_at', '<=', $args->get('toDate'));
                }
            })
            ->whereHas('transaction.operation', static function ($query) use ($args) {
                /** @var Builder $query */
                if ($args->get('wallet')) {
                    $query->where('to_module', $args->get('wallet'));
                }
            })
            ->when($args->get('commission'), static function ($query) use ($args) {
                $query->where('module_id', $args->get('commission'));
            })
            ->get();


        $earnings = $earnings->sortByDesc(static function ($earning) {
            return $earning->transaction->created_at;
        });

        return $earnings;

//        return $transactionServices->getTransactions(collect($args))->get();
    }


}

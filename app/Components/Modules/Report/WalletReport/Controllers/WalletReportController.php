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

namespace App\Components\Modules\Report\WalletReport\Controllers;

use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\Report\WalletReport\ModuleCore\Traits\DownloadReport;
use App\Components\Modules\Report\WalletReport\WalletReportIndex as Module;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;


/**
 * Class WalletReportController
 * @package App\Components\Modules\Report\WalletReport\Controllers
 */
class WalletReportController extends Controller
{

    use DownloadReport;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }


    /**
     * @return Factory|View
     */
    function fundReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'heading_text' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'WalletReport.report') => getScope() . '.walletReport.fundReport',
                _mt($this->module->moduleId, 'WalletReport.wallet') => getScope() . '.walletReport.fundReport',
                _mt($this->module->moduleId, 'WalletReport.fund_report') => getScope() . '.walletReport.fundReport'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.skinNice.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId,
        ];

        return view('Report.WalletReport.Views.fundReportIndex', $data);
    }

    /**
     * get filter for fund  report
     *
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function fundReportFilters(ModuleServices $moduleServices)
    {
        $data = [
            'default_filter' => [
                'minAmount' => 0,
                'maxAmount' => 1000000,
            ],
            'moduleId' => $this->module->moduleId,
            'wallets' => $moduleServices->getWalletPool()
        ];

        return view('Report.WalletReport.Views.Partials.FundReport.filter', $data);
    }

    /**
     * fetch table for fund report
     * @param Request $request
     * @return Factory|View
     */
    function fetchFundReport(Request $request)
    {
        $filters = $request->input('filters');
        $walletModule = getModule((int)$filters['wallet']);

        $data = [
            'fundData' => app()->call([$this, 'fetchUserFundData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId,
            'walletSlug' => Str::camel($walletModule->registry['key']),
        ];

        return view('Report.WalletReport.Views.Partials.FundReport.reportTable', $data);
    }

    /**
     * fetch fund data
     *
     * @param Collection $filters
     * @param UserServices $userServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchUserFundData(Collection $filters, UserServices $userServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $userServices->getUsers(collect($filters), null, true)->{$method}($pages);
    }


    /**
     * @return Factory|View
     */
    function fundTransferReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'WalletReport.fund_transfer_report'),
            'heading_text' => _mt($this->module->moduleId, 'WalletReport.fund_transfer_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'WalletReport.report') => getScope() . '.walletReport.fundTransferReport',
                _mt($this->module->moduleId, 'WalletReport.wallet') => getScope() . '.walletReport.fundTransferReport',
                _mt($this->module->moduleId, 'WalletReport.fund_transfer_report') => getScope() . '.walletReport.fundTransferReport'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.skinNice.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId,
        ];


        return view('Report.WalletReport.Views.fundTransferReportIndex', $data);
    }


    /**
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function fundTransferReportFilters(ModuleServices $moduleServices)
    {
        $data = [
            'default_filter' => [
                'startDate' => Transaction::min('created_at'),
                'endDate' => Transaction::max('created_at'),
                'minAmount' => 0,
                'maxAmount' => 10000,
            ],
            'moduleId' => $this->module->moduleId,
            'wallets' => $moduleServices->getWalletPool()
        ];

        return view('Report.WalletReport.Views.Partials.FundTransferReport.filter', $data);

    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    function fetchFundTransferReport(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'fundTransferData' => app()->call([$this, 'fetchUserFundTransferData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId,
        ];

        return view('Report.WalletReport.Views.Partials.FundTransferReport.reportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param TransactionServices $transactionServices
     * @return mixed
     */
    function fetchUserFundTransferData(Collection $filters, TransactionServices $transactionServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';
        $date = explode(' - ', $filters->get('date'));
        $options = [
            'operation' => TransactionOperation::slugToId('fund_transfer'),
            'wallet' => [
                $filters['from_module'] ? $filters['from_module'] : null,
                $filters['to_module'] ? $filters['to_module'] : null,
            ],
            $options['fromDate'] = $date[0],
            $options['toDate'] = $date[1],
        ];

        if ($filters->get('payee')) $options['user'][] = [$filters->get('payee'), 'payee'];
        if ($filters->get('payer')) $options['user'][] = [$filters->get('payer'), 'payer'];

        return $transactionServices->getTransactions(collect($options))
            ->when($minimum = $filters->get('minimum'), function ($query) use ($minimum) {
                /** @var Builder $query */
                $query->where('amount', '>=', $minimum);
            })->when($maximum = $filters->get('maximum'), function ($query) use ($maximum) {
                /** @var Builder $query */
                $query->where('amount', '<=', $maximum);
            })->{$method}($pages);
    }
}

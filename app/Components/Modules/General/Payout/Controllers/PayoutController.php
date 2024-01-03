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

namespace App\Components\Modules\General\Payout\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PayoutGatewayInterface;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Traits\Security;
use App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest;
use App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus;
use App\Components\Modules\General\Payout\ModuleCore\Eloquents\Transaction;
use App\Components\Modules\General\Payout\ModuleCore\Services\PayoutServices;
use App\Components\Modules\General\Payout\ModuleCore\Traits\DownloadReport;
use App\Components\Modules\General\Payout\ModuleCore\Traits\Validations;
use App\Components\Modules\General\Payout\PayoutIndex as Module;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Class PayoutController
 * @package App\Components\Modules\General\Payout\Controllers
 */
class PayoutController extends Controller
{
    use Validations, DownloadReport, Security;

    /**
     * @var $module ModuleBasicAbstract
     */
    public $module;

    protected $nonceAction = 'payout';

    /**
     * PayoutController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app(Module::class);
    }

    /**
     * @param PayoutServices $payoutServices
     * @return Factory|View
     */
    function adminIndex(PayoutServices $payoutServices)
    {
        $scope = session('theScope') ?: 'user';
        $data = [
            'scripts' => [
                '//www.gstatic.com/charts/loader.js',
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/progressbar.min.js'),
                asset('global/plugins/countUpJS/dist/countUp.js'),
                asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                $this->module->getCssPath('style.css'),
            ],
            'title' => _mt($this->module->moduleId, 'Payout.Payout_Management'),
            'heading_text' => _mt($this->module->moduleId, 'Payout.Payout_Management'),
            'breadcrumbs' => [
                _t('index.home') => "admin.home",
                _mt($this->module->moduleId, 'Payout.Payout_Management') => "$scope.payout"
            ],
            'moduleId' => $this->module->moduleId
        ];
        $requestDetails = $payoutServices->getPayoutRequests(
//            [
//            'status' => PayoutStatus::getIdFromSlug('pending'),
//        ]
        )->groupBy('status')->selectRaw('*, SUM(request_amount) amount')->get();
        $statuses = ['approved', 'pending'];

        foreach ($statuses as $status)
            $data[$status] = $requestDetails->filter(function ($value) use ($status) {
                return PayoutStatus::getSlugFromId($value->status) == $status;
            })->first();

        return view('General.Payout.Views.Admin.index', $data);
    }

    /**
     * Request Payout units
     *
     * @param Request $request
     * @return JsonResponse
     */
    function requestUnit(Request $request)
    {
        $unitMethod = $request->get('unit');
        $args = $request->input('args') ?: [];
        $args['pages'] = $request->input('totalToShow', 10);

        if ($unitMethod && ($method = Str::camel($unitMethod)))
            return app()->call([$this, $method], $args);

        return response()->json(['status' => false, 'message' => 'The action is not allowed !']);
    }

    /**
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function manualPayout(ModuleServices $moduleServices)
    {
        $data['filters'] = [
            'balance' => [
                'default' => null
            ],
            'minBalance' => [
                'default' => 1
            ],
            'maxBalance' => [
                'default' => 1000
            ],
            'wallet' => [
                'values' => $moduleServices->getWalletPool(),
                'default' => $moduleServices->slugToId('Wallet-Ewallet'),
            ]
        ];
        $data['businessWallet'] = $moduleServices->callModule('Wallet-BusinessWallet')->moduleId;
        $data['moduleId'] = $this->module->moduleId;
        $data['targets'] = array_filter($moduleServices->getPaymentPool(), function ($value) {
            return $value instanceof PayoutGatewayInterface;
        });

        return view('General.Payout.Views.Admin.Partials.manualPayout', $data);
    }

    /**
     * @param Request $request
     * @param UserServices $userServices
     * @return Factory|View
     */
    function users(Request $request, UserServices $userServices)
    {
        $args = array_merge([
            'minBalance' => 1
        ], $request->input('filters', []));
        $data['users'] = $userServices->getUsers(collect($args));
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Partials.users', $data);
    }

    /**
     * @param User $user
     * @param UserServices $userServices
     * @return Factory|View
     */
    function basicProfile(User $user, UserServices $userServices)
    {
        $data['user'] = $userServices->getUser($user, 'repoData.sponsorUser');
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Partials.basicProfile', $data);
    }

    /**
     * @return JsonResponse
     */
    function validatePayout()
    {
        if (($validator = app()->call([$this, 'validator'])) && $validator->fails())
            return response()->json(array_unique($validator->errors()->unique()), 422);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function statement(Request $request)
    {
        $data['transactions'] = Transaction::find(array_column($request->input('transactions', []), 'id'))
            ->map(function ($value) {
                return [
                    'payee' => User::find($value->payee),
                    'date' => $value->created_at->format('M d Y'),
                    'readableDate' => $value->created_at->diffForHumans(),
                    'amount' => $value->amount,
                    'formattedAmount' => currency($value->amount)
                ];
            });

        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Partials.statement', $data);
    }

    /**
     * get total manually Paid out amount
     * @param TransactionServices $transactionServices
     * @return mixed
     */
    function manuallyProcessed(TransactionServices $transactionServices)
    {
        $args = [
            'operation' => TransactionOperation::slugToId('payout')
        ];
        /** @var Builder $transactionsBuilder */
        $transactionsBuilder = $transactionServices->getTransactions(collect($args), Transaction::class);
        $total = $transactionsBuilder->doesntHave('payoutRequest')->get()->sum('amount');

        return $total;
    }

    /**
     * @return Factory|View
     */
    function releaseRequests()
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Partials.releaseRequest', $data);
    }

    /**
     * @param Request $request
     * @param PayoutServices $payoutServices
     * @return Factory|View
     */
    function getPayoutRequests(Request $request, PayoutServices $payoutServices)
    {
        $filters = collect([
            'status' => PayoutStatus::getIdFromSlug('pending'),
            'minimum' => 0,
            'perPage' => 50,
        ])->merge(array_filter($request->input('filters'), function ($value) {
            return $value;
        }));
        $requests = $payoutServices->getPayoutRequests($filters);
        $data = [
            'moduleId' => $this->module->moduleId,
            'filters' => $filters,
            'pagination' => [
                'from' => $paginateFrom = ($currentPage = (int)$request->input('page') * $perPage = $filters->get('perPage')) + 1,
                'total' => $totalItems = $requests->count(),
                'to' => ($to = ($paginateFrom + $perPage)) < $totalItems ? $to : $totalItems,
            ],
            'requests' => $requests->paginate($filters->get('perPage')),
        ];

        return view('General.Payout.Views.Admin.Partials.requests', $data);
    }

    /**get index page of request report
     *
     * @return Factory|View
     */
    function payoutRequestReportIndex()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                asset('global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.skinNice.css'),
                asset('global/css/report-style.css')
            ],
            'moduleId' => $this->module->moduleId
        ];

        $data['title'] = _mt($this->module->moduleId, 'Payout.payout_request_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'Payout.payout_request_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'Payout.report') => $scope . '.payout.report.request',
            _mt($this->module->moduleId, 'Payout.payout') => $scope . '.payout.report.request',
            _mt($this->module->moduleId, 'Payout.payout_request_report') => $scope . '.payout.report.request'
        ];

        return view('General.Payout.Views.Admin.Report.payoutRequestReportIndex', $data);
    }

    /**
     * get request report filters
     *
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function requestReportFilters(ModuleServices $moduleServices)
    {
        $data = [
            'default_filter' => [
                'startDate' => PayoutRequest::min('created_at'),
                'endDate' => PayoutRequest::max('created_at'),
                'minAmount' => PayoutRequest::min('request_amount'),
                'maxAmount' => PayoutRequest::max('request_amount'),
            ],
            'moduleId' => $this->module->moduleId,
            'wallets' => $moduleServices->getWalletPool(true)
        ];

        return view('General.Payout.Views.Admin.Report.payoutRequestReportFilter', $data);
    }

    /**
     * fetch payout request report table
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchPayoutRequestReport(Request $request)
    {
        $filters = $request->input('filters');
        $data['payoutRequestData'] = app()->call([$this, 'fetchPayoutRequestData'], ['filters' => collect($filters)]);
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Report.payoutRequestReportTable', $data);
    }

    /** fetch payout request data
     *
     * @param Collection $filters
     * @param PayoutServices $payoutServices
     * @return mixed
     */
    function fetchPayoutRequestData(Collection $filters, PayoutServices $payoutServices)
    {
        return $payoutServices->getPayoutData(collect([]))
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            })->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $query->whereBetween('created_at', explode(' - ', $filters->get('date')));
            })->when($wallet = $filters->get('wallet'), function ($query) use ($wallet) {
                /** @var Builder $query */
                $query->where('wallet', $wallet);
            })->when($amountFrom = $filters->get('amountFrom'), function ($query) use ($amountFrom) {
                /** @var Builder $query */
                $query->where('request_amount', '>=', $amountFrom);
            })->when($amountTo = $filters->get('amountTo'), function ($query) use ($amountTo) {
                /** @var Builder $query */
                $query->where('request_amount', '<=', $amountTo);
            })->get();
    }

    /**
     * payout released report index
     *
     * @return Factory|View
     */
    function payoutReleasedReportIndex()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                asset('global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.css'),
                asset('global/plugins/ion.rangeslider/css/ion.rangeSlider.skinNice.css'),
                asset('global/css/report-style.css')
            ],
            'moduleId' => $this->module->moduleId
        ];

        $data['title'] = _mt($this->module->moduleId, 'Payout.payout_released_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'Payout.payout_released_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'Payout.report') => $scope . '.payout.report.request',
            _mt($this->module->moduleId, 'Payout.payout') => $scope . '.payout.report.request',
            _mt($this->module->moduleId, 'Payout.payout_released_report') => $scope . '.payout.report.Released'
        ];

        return view('General.Payout.Views.Admin.Report.payoutReleasedReportIndex', $data);
    }

    /**
     * released report filters
     *
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function releasedReportFilters(ModuleServices $moduleServices)
    {
        $data = [
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => date('Y-m-d h:i:s'),
                'minAmount' => 0,
                'maxAmount' => 1000,
            ],
            'moduleId' => $this->module->moduleId,
            'wallets' => $moduleServices->getWalletPool(true)
        ];

        return view('General.Payout.Views.Admin.Report.payoutReleasedReportFilter', $data);
    }

    /**
     * fetch report table released report
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchPayoutReleasedReport(Request $request)
    {
        $filters = $request->input('filters');
        $data['payoutReleasedData'] = app()->call([$this, 'fetchPayoutReleasedData'], ['filters' => collect($filters)]);
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Payout.Views.Admin.Report.payoutReleasedReportTable', $data);
    }

    /**
     * fetch payout released data from db
     *
     * @param Collection $filters
     * @param TransactionServices $transactionServices
     * @return mixed
     */
    function fetchPayoutReleasedData(Collection $filters, TransactionServices $transactionServices)
    {
        $options['operation'] = TransactionOperation::slugToId('payout');
        if ($filters['wallet'])
            $options['wallet'] = [$filters['wallet']];


        return $transactionServices->getTransactions(collect($options))
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('payer', $userId);
            })->when($filters->get('date'), function ($query) use ($filters) {
                $dates = explode(' - ', $filters->get('date'));
                /** @var Builder $query */
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })->when($amountFrom = $filters->get('amountFrom'), function ($query) use ($amountFrom) {
                /** @var Builder $query */
                $query->where('amount', '>=', $amountFrom);
            })->when($amountTo = $filters->get('amountTo'), function ($query) use ($amountTo) {
                /** @var Builder $query */
                $query->where('amount', '<=', $amountTo);
            })
            ->get();
    }

    /**
     * @param PayoutServices $payoutServices
     * @return Factory|View
     */
    function userIndex(PayoutServices $payoutServices)
    {
        $scope = session('theScope') ?: 'user';
        $data = [];
        $data['scripts'] = [
            '//www.gstatic.com/charts/loader.js',
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/progressbar.min.js'),
            asset('global/plugins/countUpJS/dist/countUp.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/owl-carousel/owl.carousel.js'),
        ];
        $data['styles'] = [
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/owl-carousel/owl.carousel.css'),
            asset('global/plugins/owl-carousel/owl.theme.css'),
            $this->module->getCssPath('style.css')
        ];
        $data['title'] = _mt($this->module->moduleId, 'Payout.Payout_Management');
        $data['heading_text'] = _mt($this->module->moduleId, 'Payout.Payout_Management');
        $data['breadcrumbs'] = [
            _t('index.home') => "user.home",
            _mt($this->module->moduleId, 'Payout.Payout_Management') => $scope . '.payout'
        ];
        $data['moduleId'] = $this->module->moduleId;

        $requestDetails = $payoutServices->getPayoutRequests([
            'userId' => loggedId(),
        ])->groupBy('status')->selectRaw('*, SUM(request_amount) amount')->get();

        $statuses = ['approved', 'pending'];
        foreach ($statuses as $status)
            $data[$status] = $requestDetails->filter(function ($value) use ($status) {
                return PayoutStatus::getSlugFromId($value->status) == $status;
            })->first();

        if (checkAccess(loggedId(), 'payout'))
            return view('General.Payout.Views.User.index', $data);
        else
            return view('Common.no_access');
    }


    /* ------------------------- User Section ----------------------------*/

    /**
     * @return Factory|View
     */
    function payoutRequests()
    {
        $data = [
            'scripts' => [
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            ],
            'styles' => [
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
            ],
            'moduleId' => $this->module->moduleId,
            'statuses' => PayoutStatus::get(),
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => User::max('created_at')
            ],
        ];

        return view('General.Payout.Views.User.Partials.payoutRequests', $data);
    }

    /**
     * @param Request $request
     * @param PayoutServices $payoutServices
     * @return Factory|View
     */
    function getRequestList(Request $request, PayoutServices $payoutServices)
    {
        $filters = array_merge(['userId' => loggedId()], $request->input('filters'));
        $data['moduleId'] = $this->module->moduleId;
        $data['requests'] = $payoutServices->getPayoutRequests($filters)->paginate($request->input('totalToShow', 10));

        return view('General.Payout.Views.User.Partials.requestList', $data);
    }

    /**
     * @param ModuleServices $moduleServices
     * @param Plugins $plugins
     * @return Factory|View
     * @throws Exception
     */
    function requestNew(ModuleServices $moduleServices, Plugins $plugins)
    {
//        if (!$plugins->isKycVerified(loggedUser()))
//            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'Payout.Sorry_you_need_to_be_verify_your_kyc_before_access_this_section')]);

//        $someDate = new DateTime(loggedUser()->created_at);
//        $now = new DateTime();

//        if ($someDate->diff($now)->days <= 7)
//            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'Payout.min_7_days_to_payout')]);

        $todayRequest = PayoutRequest::where('user_id', loggedId())->whereDate('created_at', Carbon::today())->count();
        if ($todayRequest > 0)
            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'Payout.already_requested_today')]);


        $data = [
            'moduleId' => $this->module->moduleId,
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js')
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            ],
            'targets' => array_filter($moduleServices->getPaymentPool(), function ($value) {
                return $value instanceof PayoutGatewayInterface;
            }),
        ];

        $moduleData = getModule($this->module->moduleId)->getModuleData();

        $data['payoutStatus'] = 1;

        if (isset($moduleData['restrict_multi_request'])) {
            $pendingId = PayoutStatus::where('slug', 'pending')->first()->id;
            $pendingRequest = PayoutRequest::where('user_id', loggedId())->where('status', $pendingId)->count();
            if ($pendingRequest > 0) {
                $data['payoutStatus'] = 0;
            }
        }

        return view('General.Payout.Views.User.Partials.requestNew', $data);
    }

    /**
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @param PayoutServices $payoutServices
     * @return Factory|View
     */
    function walletPicker(Request $request, ModuleServices $moduleServices, PayoutServices $payoutServices)
    {
        $data['moduleId'] = $this->module->moduleId;
        $data['wallets'] = array_filter($moduleServices->getWalletPool(true), function ($module) {
            /** @var ModuleBasicAbstract $module */
            return $module->getModuleData(true)->get('payout_provision');
        });
        $data['selectedWallet'] = $selectedWallet = $request->input('wallet', collect($data['wallets'])->first()->moduleId);
        $walletModule = getModule((int)$selectedWallet);
        $data['balance'] = $payoutServices->balanceByWallet(loggedUser(), $walletModule);
        $requestDetails = $payoutServices->getPayoutRequests([
            'userId' => loggedId(),
            'wallet' => $selectedWallet,
        ])->groupBy('status')->selectRaw('*, SUM(request_amount) amount')->get();

        $statuses = ['approved', 'pending'];

        foreach ($statuses as $status)
            $data[$status] = $requestDetails->filter(function ($value) use ($status) {
                return PayoutStatus::getSlugFromId($value->status) == $status;
            })->first();

        $data['lastRequest'] = $payoutServices->getPayoutRequests([
            'userId' => loggedId(),
            'wallet' => $selectedWallet,
        ])->first();

        $data['charges'] = defineFilter('transactionCharge', [], 'payout', ['amount' => 0]);

        return view('General.Payout.Views.User.Partials.walletPicker', $data);
    }

    /**
     * @param Request $request
     * @param Plugins $plugins
     * @return JsonResponse
     */
    function validateRequest(Request $request, Plugins $plugins)
    {
        $validatorFactory = $this->getValidationFactory();
        $validator = $validatorFactory->make($request->all(), $this->validatePayoutRequest());
        $walletModule = getModule((int)$request->input('wallet'));
        /** @var WalletModuleInterface|ModuleBasicAbstract $walletModule */
        $balance = $walletModule->getBalance(loggedUser(), false);
        $payoutConfig = $this->payoutConfig();
//        $agreementLevel = $plugins->getLevel(loggedId());
        $transactionCharges = collectiveAmount(collect(defineFilter('transactionCharge', [], 'payout', ['amount' => $request->input('request_amount')])));
        //$netAmount =

        $validator->after(function ($validator) use ($transactionCharges, $payoutConfig, $balance, $request) {
            if ((bcadd($request->input('request_amount'), $transactionCharges, 8)) > $balance)
                $validator->errors()->add('balance', _mt($this->module->moduleId, 'Payout.Insufficient_balance'));

//            if (!$payoutConfig)
//                $validator->errors()->add('amount', _mt($this->module->moduleId, 'Payout.payout_stages_not_configured'));

//            if (!$stages = (array)$payoutConfig->get('stages'))
//                $validator->errors()->add('amount', '');

//            if (!in_array($agreementLevel, array_keys($stages)))
//                $validator->errors()->add('amount', _mt($this->module->moduleId, 'Payout.payout_not_configured_for_agreement_level'));
//            else {
//                if ($request->input('request_amount') < $stages[$agreementLevel]['minimum'])
//                    $validator->errors()->add('amount', _mt($this->module->moduleId, 'Payout.less_than_minimum_payout_amount') . $stages[$agreementLevel]['minimum']);
//                if ($request->input('request_amount') > $stages[$agreementLevel]['maximum'])
//                    $validator->errors()->add('amount', _mt($this->module->moduleId, 'Payout.more_than_maximum_payout_amount') . $stages[$agreementLevel]['maximum']);
//            }

            if ($request->input('request_amount') > $balance)
                $validator->errors()->add('balance', _mt($this->module->moduleId, 'Payout.Insufficient_balance'));
        });

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        return response('true');
    }

    /**
     * @return Collection
     */
    function payoutConfig()
    {
        return $this->module->getModuleData(true);
    }

    /**
     * @param Request $request
     * @param PayoutServices $payoutServices
     * @return string
     * @throws Exception
     */
    function cancelRequest(Request $request, PayoutServices $payoutServices)
    {
        return response(['message' => $payoutServices->cancelRequest($request->input('id'))]);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function gatewayView(Request $request)
    {
        return getModule((int)$request->input('gateway'))->payoutView();
    }


    /**
     * @param Request $request
     * @param TransactionServices $transactionServices
     * @return array
     */
    public function releaseRequestedPayouts(Request $request, TransactionServices $transactionServices, PayoutServices $payoutServices)
    {
        if (!session('payout-verified')) return;

        $releaseArray = $request->input('payout');
        $statusArray = [];

        foreach ($releaseArray as $key => $amount) {

            $payoutRequest = PayoutRequest::find($key);
            $transaction = Transaction::find($payoutRequest->transaction_id);

            $payoutResponse = callModule($payoutRequest->gateway, 'processRequestedPayout', ['requestId' => $key, 'amount' => $transaction->amount]);

            if ($payoutResponse['status'] == 'success') {
                $approvedSlug = PayoutStatus::where('slug', 'approved')->first()->id;

                $payoutRequest->update(['status' => $approvedSlug, 'release_amount' => $amount]);
                $transaction->update(['status' => 1]);
            }

            $statusArray[] = ['request_id' => $key, 'status' => $payoutResponse['status']];

        }

        return $statusArray;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function getCharges(Request $request)
    {
        $data['charges'] = defineFilter('transactionCharge', [], 'payout', ['amount' => $request->input('amount')]);

        return view('General.Payout.Views.User.Partials.transactionCharges', $data);
    }
}

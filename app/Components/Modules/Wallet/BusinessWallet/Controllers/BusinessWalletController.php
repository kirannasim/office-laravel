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

namespace App\Components\Modules\Wallet\BusinessWallet\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Traits\Graph\DateTimeFormatter;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Components\Modules\Wallet\BusinessWallet\BusinessWalletIndex;
use App\Components\Modules\Wallet\BusinessWallet\BusinessWalletIndex as Module;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Services\BusinessWalletServices;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Validations;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


/**
 * Class BusinessWalletController
 * @package App\Components\Modules\Wallet\BusinessWallet\Controllers
 */
class BusinessWalletController extends Controller
{
    use Validations, GraphHelper, DateTimeFormatter;

    /**
     * @var Application|businessWalletIndex
     */
    protected $module;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();

        $this->module = app(Module::class);
    }

    /**
     * index function
     *
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
                asset('global/plugins/countUpJS/dist/countUp.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                $this->getModule()->getCssPath('style.css'),
            ],
            'title' => _mt($this->module->moduleId, 'BusinessWallet.Business_Wallet'),
            'heading_text' => _mt($this->module->moduleId, 'BusinessWallet.Business_Wallet'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'BusinessWallet.Wallets') => 'businesswallet',
                _mt($this->module->moduleId, 'BusinessWallet.Business_Wallet') => 'businesswallet'
            ],
            'wallet' => [],
            'balance' => $this->module->getBalance(User::companyUser()),
            'moduleId' => $this->module->moduleId,
            'walletConfig' => getModule($this->module->moduleId)->getModuleData(true)
        ];

        return view('Wallet.BusinessWallet.Views.index', $data);
    }

    /**
     * @return Application|ModuleBasicAbstract|WalletModuleInterface
     */
    protected function getModule()
    {
        return $this->module;
    }

    /**
     * Request BusinessWallet units
     *
     * @param Request $request
     * @return JsonResponse
     */
    function requestUnit(Request $request)
    {
        $unitMethod = $request->get('unit');
        $args = $request->input('args') ?: [];

        if ($unitMethod && ($method = 'get' . ucfirst($unitMethod)))
            return app()->call([$this, $method], $args);

        return response()->json(['status' => false, 'message' => _mt($this->module->moduleId, 'BusinessWallet.The_action_is_not_allowed')]);
    }

    /**
     * @return Factory|View
     */
    function getOverView()
    {
        $data = [
            'scripts' => [],
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.overView', $data);
    }

    /**
     * @return Factory|View
     */
    function getIncomeChart()
    {
        $args = [
            'groupBy' => 'month',
            'fromDate' => Carbon::now()->startOfYear(),
        ];
        /** @var Builder $transactions */
        $monthlyIncome = $this->prepareShortGraphData($this->module->credited(companyUser(), $args)->get(), $groupBy = $args['groupBy']);
        $monthlyExpense = $this->prepareShortGraphData($this->module->debited(companyUser(), $args)->get(), $groupBy = $args['groupBy']);
        $data = [
            'monthlyIncome' => $this->formatToArrayForGraph($monthlyIncome),
            'monthlyExpense' => $this->formatToArrayForGraph($monthlyExpense),
            'moduleId' => $this->module->moduleId,
            'xAxises' => $this->sortData($monthlyIncome->keys()->merge($monthlyExpense->keys()), $groupBy),
        ];

        return view('Wallet.BusinessWallet.Views.Partials.incomeExpenseGraph', $data);
    }

    /**
     * @param array $args
     * @return static
     */
    function formatData($args = [])
    {
        /** @var TransactionServices $transactionServices */
        $transactionServices = app(TransactionServices::class);
        /** @var Builder $transactions */
        $transactions = defineFilter('businessTransactions', $transactionServices->getTransactions(collect($args)))
            ->get()->groupBy('month');
        /** @var Builder $transactions */

        return collect(range(1, 12))->mapWithKeys(function ($value, $key) use ($transactions) {
            $item = $transactions->toBase()->get($value);
            return [$value => $item ? $item->sum('total') : 0];
        })->values();
    }

    /**
     * Get getTransfer
     * @param Request $request [description]
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function getTransfer(Request $request, ModuleServices $moduleServices)
    {
        $data = [
            'wallets' => $moduleServices->getWalletPool('active'),
            'gateway' => callModule('Payment-BusinessWallet')->moduleId,
            'moduleId' => $this->module->moduleId
        ];

        $walletData = getModule($this->module->moduleId)->getModuleData(true);

        if ($walletData->get('ip_status') && $walletData->get('ip') != $request->ip())
            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'BusinessWallet.Sorry_but_you_don_have_permission_to_access_this_page')]);
        else
            return view('Wallet.BusinessWallet.Views.Partials.transfer', $data);
    }

    /**
     * @param ModuleServices $moduleServices
     * @return mixed
     */
    function initPayment(ModuleServices $moduleServices)
    {
        return $moduleServices->callModule('Payment-BusinessWallet')->renderView();
    }

    /**
     * @param Request $request
     * @return bool
     */
    function hasSufficientBalance(Request $request)
    {
        $totalAmount = 0;

        foreach ($request->input('payee.*') as $id => $payee)
            $totalAmount += $payee['amount'];

        if ($this->module->getBalance(User::companyUser(), false) >= $totalAmount)
            return true;

        return false;
    }

    /**
     * get transaction list
     *
     * @param TransactionServices $transactionServices
     * @param BusinessWalletServices $businessWalletServices
     * @param Request $request
     * @return Factory|View
     */
    function getTransactionList(TransactionServices $transactionServices, BusinessWalletServices $businessWalletServices, Request $request)
    {
        $fromDate = Transaction::min('created_at');
        $args = array_merge([
            'user' => companyUser()->id,
            'wallet' => $this->module->moduleId,
        ], $request->input('filters', []));

        $data['filters'] = [
            'operation' => [
                'values' => TransactionOperation::all(),
                'default' => ''
            ],
            'type' => [
                'values' => ['income', 'expense'],
                'default' => ''
            ],
            'fromDate' => [
                'default' => $fromDate,
            ],
            'toDate' => [
                'default' => date('Y-m-d'),
            ],
            'groupBy' => [
                'values' => ['Day', 'Month', 'Year'],
                'default' => 'month'
            ],
            'sortBy' => [
                'values' => [
                    'created_at' => 'Date',
                    'transactions.id' => 'TXN ID',
                    'transactions.amount' => 'Amount',
                ],
                'default' => 'created_at'
            ],
            'orderBy' => [
                'values' => ['asc', 'desc'],
                'default' => 'desc'
            ],
        ];
        //Preparing default filter data for view
        foreach ($data['filters'] as $key => $value)
            $data['filters'][$key]['default'] = $request->input("filters.$key", $value['default']);

        /** @var Collection $transactions */
        $paginator = $transactionServices->getTransactions(collect($args)->except(['groupBy']))->paginate(10);
        $transactions = collect($paginator->items());
        $data['groupOfTransaction'] = $transactions
            ->map(function ($value) use ($transactionServices) {
                return $transactionServices->bindExtraAttributes($value, $this->module, companyUser());
            })
            ->merge($businessWalletServices->getExtraIncome(collect($args)
                ->except(['groupBy', 'type', 'user', 'wallet'])))
            ->groupBy(function ($value) use ($data) {
                return $this->formatToGroupBy($value, $data['filters']['groupBy']['default']);
            });
        $data['moduleId'] = $this->module->moduleId;

        return view('Wallet.BusinessWallet.Views.Partials.transactionList', $data);
    }

    /**
     * @param Model $model
     * @param $groupBy
     * @return string
     */
    function formatToGroupBy(Model $model, $groupBy)
    {
        /** @var Carbon $createdAt */
        $createdAt = $model->created_at;

        switch ($groupBy) {
            case 'year':
                return $createdAt->format('Y');
                break;
            case 'month':
                return $createdAt->format('F');
                break;
            default:
                return $createdAt->format('l');;
                break;
        }
    }

    /**
     * get pay in out chart
     *
     * @return Factory|View
     */
    function getPayInOutChart()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/amcharts/amcharts/amchart_new.js'),
                asset('global/plugins/amcharts/amcharts/pie_new.js'),
            ],
            'payIn' => $this->module->credited(companyUser())->sum('amount'),
            'payOut' => $this->module->debited(companyUser())->sum('amount'),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.payInOutChart', $data);
    }

    /**
     * get Settings
     *
     * @return Factory|View
     */
    function getSettings()
    {
        $data = [
            'scripts' => [],
            'walletSettings' => getModule($this->module->moduleId)->getModuleData(true),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.settings', $data);
    }

    /**
     * Set current Business-wallet config values
     *
     * @return Collection
     */
    function walletConfig()
    {
        /** @var ModuleServices $moduleServices */
        $moduleServices = app(ModuleServices::class);

        return collect($moduleServices->getModuleData($this->module->moduleId));
    }

    /**
     * get ip whitelisting
     *
     * @return Factory|View
     */
    function getPasswordChanger()
    {
        $data = [
            'scripts' => [],
            'walletSettings' => getModule($this->module->moduleId)->getModuleData(true),
            'moduleId' => $this->module->moduleId
        ];

        if ($data['walletSettings']->get('transaction_password'))
            return view('Wallet.BusinessWallet.Views.Partials.passwordChange', $data);
        else
            return view('Wallet.BusinessWallet.Views.Partials.setWalletPassword', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function renderLoginPasswordView()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.checkLoginPassword', $data);
    }

    /**
     * Change Transaction Password
     *
     * @param Request $request
     * @return JsonResponse
     */

    function submitTransactionPass(Request $request)
    {
        if (($validator = $this->validateCurrentTransactionPass($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        if (!Hash::check($request->input('transactionPass'), $walletConfig->get('transaction_password'))) {
            $validator->errors()->add('transactionPass', 'Current transaction password entered is invalid');
            return response()->json($validator->errors(), 422);
        }

        if ($request->session()->get('tranPasswordData'))
            $this->changePassword($request);

        if ($request->session()->get('whitelistData'))
            $this->whitelist($request);
    }

    /**
     * @param Request $request
     */
    function changePassword(Request $request)
    {
        $moduleServices = app(ModuleServices::class);
        $tranPasswordData = $request->session()->get('tranPasswordData');
        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        $walletConfig = ['transaction_password' => bcrypt($tranPasswordData['password'])];
        $moduleServices->setModuleData($walletConfig, $this->module->moduleId);
        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postChangeTransactionPasswordActions', 'change_transaction_password', $data);
        session()->forget(['tranPasswordData', 'walletAction']);
    }

    /**
     * @param Request $request
     */
    function whitelist(Request $request)
    {
        $moduleServices = app(ModuleServices::class);

        $whitelistData = $request->session()->get('whitelistData');
        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        $walletConfig['ip_status'] = $whitelistData['ipStatus'];
        $walletConfig['ip'] = $whitelistData['ip'];
        $moduleServices->setModuleData($walletConfig, $this->module->moduleId);
        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postIpWhitelistActions', 'ip_whitelist', $data);
        session()->forget(['whitelistData', 'walletAction']);
    }

    /**
     * @param Request $request
     * @param ModuleServices $moduleServices
     */
    function changeTranPassword(Request $request, ModuleServices $moduleServices)
    {
        $whitelistData = $request->session()->get('tranPasswordData');
        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        $walletConfig['transaction_password'] = bcrypt($whitelistData['password']);
        $moduleServices->setModuleData($walletConfig, $this->module->moduleId);
        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postChangeTransactionPasswordActions', 'change_transaction_password', $data);
        session()->forget(['tranPasswordData', 'walletAction']);

    }

    /**
     * get ip whitelisting
     *
     * @return Factory|View
     */
    function getIpWhiteList()
    {
        $data = [
            'scripts' => [],
            'walletSettings' => getModule($this->module->moduleId)->getModuleData(true),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.ipWhitelist', $data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function ipWhitelist(Request $request)
    {
        if (($validator = $this->validatorIpWhitelist($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);
        session(['whitelistData' => $request->all(), 'walletAction' => 'whitelist']);
    }

    /**
     * @return Factory|View
     */
    function renderTranPasswordView()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.BusinessWallet.Views.Partials.checkTranPassword', $data);
    }

    /**
     * Set Transaction Password
     *
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @return void
     */
    function setTransactionPassword(Request $request, ModuleServices $moduleServices)
    {
        if (($validator = $this->validateCurrentLoginPass($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        if (!Hash::check($request->input('loginPass'), User::find(loggedId())->password)) {
            $validator->errors()->add('loginPass', 'Login password entered is invalid');
            return response()->json($validator->errors(), 422);
        }

        $tranPasswordData = $request->session()->get('tranPasswordData');

        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        $walletConfig['transaction_password'] = bcrypt($tranPasswordData['password']);

        $moduleServices->setModuleData($walletConfig, $this->module->moduleId);

        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postChangeTransactionPasswordActions', 'change_transaction_password', $data);

        session()->forget(['tranPasswordData', 'walletAction']);
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    function checkBusinessWalletPassword(Request $request)
    {
        if (Gate::denies('businesswalletTransaction'))
            return response()->json(['status' => false, 'error' => 'Incorrect transaction password'], 401);

        if ($request->session()->has('walletAction')) {

            $method = $request->session()->get('walletAction');
            return app()->call([$this, $method]);
        }

    }

    /**
     * @param Request $request
     * @param bool $verifyOnly
     * @param string $action
     * @return Factory|View
     */
    function getTransactionPassView(Request $request, $verifyOnly = true, $action = 'transfer')
    {
        $data = [
            'verifyOnly' => $verifyOnly,
            'action' => $action
        ];

        return view('Wallet.BusinessWallet.Views.Partials.transactionPass', $data);
    }

    /**
     * Transaction Pass
     *
     * @param Request $request
     * @param bool $verifyOnly
     * @param string $action
     * @return JsonResponse|mixed
     */
    function transactionPass(Request $request, $verifyOnly = true, $action = 'transfer')
    {
        $verifyOnly = $request->input('verifyOnly', $verifyOnly);
        $action = $request->input('action', $action);

        if (Gate::denies('initBusinessWalletTransaction'))
            return response()->json(['status' => false, 'error' => 'Incorrect transaction password'], 401);

        if ($verifyOnly) return response()->json();

        $request->merge(session('paymentData', []));

        return app()->call([$this, $action], ['request' => $request]);
    }

    /**
     * @param ModuleServices $moduleServices
     * @param Request $request
     * @return Factory|View
     */
    function getDeduct(ModuleServices $moduleServices, Request $request)
    {
        $walletData = getModule($this->module->moduleId)->getModuleData(true);
        $data = [
            'wallets' => $moduleServices->getWalletPool('active'),
            'moduleId' => $this->module->moduleId,
            'gateway' => $moduleServices->callModule('Payment-BusinessWallet')->moduleId,
            'ipEnabled' => isset($walletData->ips) && (!in_array($request->ip(), $walletData->ips)) ? 0 : 1

        ];

        return view('Wallet.BusinessWallet.Views.Partials.deduct', $data);
    }

    /**
     * @param Request $request
     * @param BusinessWalletServices $businessWalletServices
     * @return mixed
     */
    public function walletBalance(Request $request, BusinessWalletServices $businessWalletServices)
    {
        return $businessWalletServices->balanceByWallet(User::find($request->user_id), getModule((INT)$request->wallet));
    }

    /**
     * get deposit fund view
     * @param Request $request [description]
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function getDeposit(Request $request, ModuleServices $moduleServices)
    {
        $walletData = getModule($this->module->moduleId)->getModuleData(true);
        $data = [
            'gateway' => $moduleServices->callModule('Payment-BusinessWallet')->moduleId,
            'moduleId' => $this->module->moduleId,
            'ipEnabled' => isset($walletData->ips) && (!in_array($request->ip(), $walletData->ips)) ? 0 : 1

        ];

        return view('Wallet.BusinessWallet.Views.Partials.deposit', $data);
    }

    /**
     * Deposit fund
     *
     * @param Request $request [description]
     * @param BusinessWalletServices $businessWalletServices
     * @param ModuleServices $moduleServices
     * @return JsonResponse
     */
    function deposit(Request $request, BusinessWalletServices $businessWalletServices, ModuleServices $moduleServices)
    {
        if (($validator = $this->depositValidator($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        if (Gate::denies('initBusinessWalletTransaction')) {
            session(['paymentData' => $request->all()]);
            return response()->json([], 403);
        }

        $payer = $payee = User::companyUser();
        $dispatch = [
            'payer' => $payer,
            'payee' => $payee,
            'amount' => $request->input('amount'),
            'remarks' => $request->input('remarks'),
            'actualAmount' => $request->input('amount'),
            'fromWallet' => $this->module->moduleId,
            'toWallet' => $this->module->moduleId,
        ];

        $result = DB::transaction(function () use ($moduleServices, $dispatch, $businessWalletServices) {
            //Add transaction
            app()->call([$businessWalletServices, 'deposit'], $dispatch);
            //update cache
            $moduleServices->callModule($this->module->moduleId, 'updateCache', ['user' => User::companyUser()]);

            session()->forget('paymentData');
        });

        return response()->json([
            'status' => true,
            'transaction' => $result,
            'balance' => $this->module->getBalance(User::companyUser()->id)
        ]);
    }
}
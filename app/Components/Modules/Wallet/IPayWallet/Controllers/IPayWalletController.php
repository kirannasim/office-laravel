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

namespace App\Components\Modules\Wallet\IPayWallet\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Traits\Graph\DateTimeFormatter;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Components\Modules\Wallet\IPayWallet\IPayWalletIndex;
use App\Components\Modules\Wallet\IPayWallet\IPayWalletIndex as Module;
use App\Components\Modules\Wallet\IPayWallet\ModuleCore\Eloquents\IPayWallet;
use App\Components\Modules\Wallet\IPayWallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\IPayWallet\ModuleCore\Traits\Validations;
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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Class IPayWalletController
 * @package App\Components\Modules\Wallet\IPayWallet\Controllers
 */
class IPayWalletController extends Controller
{
    use Validations, GraphHelper, DateTimeFormatter;

    /**
     * @var Application|IPayWalletIndex
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
            'title' => _mt($this->module->moduleId, 'IPayWallet.IPayWallet-Wallet'),
            'heading_text' => _mt($this->module->moduleId, 'IPayWallet.IPayWallet-Wallet'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'IPayWallet.Wallets') => getScope() . '.ipaywallet',
                _mt($this->module->moduleId, 'IPayWallet.IPayWallet-Wallet') => getScope() . '.ipaywallet'
            ],
            'wallet' => [],
            'balance' => $this->module->getBalance(),
            'moduleId' => $this->module->moduleId,
            'walletConfig' => getModule($this->module->moduleId)->getModuleData(true)
        ];

        return view('Wallet.IPayWallet.Views.index', $data);
    }

    /**
     * @return Application|ModuleBasicAbstract|WalletModuleInterface
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Request IPayWallet units
     *
     * @param Request $request
     * @return JsonResponse
     */
    function requestUnit(Request $request,ModuleServices $moduleServices)
    {
        $unitMethod = $request->get('unit');

        if($unitMethod == 'sync')
        {
            $user = User::find(loggedId());
            $balance = $moduleServices->callModule('Payment-IPayWallet')->createuser($user);
            return array("success"=>true);
        }
        else
        {
            $args = $request->input('args') ?: [];

            if ($unitMethod && ($method = 'get' . ucfirst($unitMethod)))
                return app()->call([$this, $method], $args);    
        }
        

        return response()->json(['status' => false, 'message' => _mt($this->module->moduleId, 'IPayWallet.The_action_is_not_allowed')]);
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

        return view('Wallet.IPayWallet.Views.Partials.overView', $data);
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
        $monthlyIncome = $this->prepareShortGraphData($this->module->credited(loggedUser(), $args)->get(), $groupBy = $args['groupBy']);
        $monthlyExpense = $this->prepareShortGraphData($this->module->debited(loggedUser(), $args)->get(), $groupBy = $args['groupBy']);
        $data = [
            'monthlyIncome' => $this->formatToArrayForGraph($monthlyIncome),
            'monthlyExpense' => $this->formatToArrayForGraph($monthlyExpense),
            'moduleId' => $this->module->moduleId,
            'xAxises' => $this->sortData($monthlyIncome->keys()->merge($monthlyExpense->keys()), $groupBy),
        ];

        return view('Wallet.IPayWallet.Views.Partials.incomeExpenseGraph', $data);
    }

    /**
     * Get Vcc
     *
     * @return Factory|View
     */
    function getVcc()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.IPayWallet.Views.Partials.vcc', $data);
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
            'wallets' => collect($moduleServices->getWalletPool('active')),
            'moduleId' => $this->module->moduleId,
            'gateway' => callModule('Payment-IPayWallet')->moduleId,
            'walletConfig' => getModule($this->module->moduleId)->getModuleData(true),
        ];
        $walletData = IPayWallet::where('user_id', loggedId())->first();

        if (!checkAccess(loggedId(), 'fund_transfer'))
            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'IPayWallet.Sorry_but_you_don_have_permission_to_send_fund')]);
        else if ($walletData->ip_status && $walletData->ip != $request->ip())
            return view('Common.Partial.no_access', ['message' => _mt($this->module->moduleId, 'IPayWallet.Sorry_but_you_don_have_permission_to_access_this_page')]);
        else
            return view('Wallet.IPayWallet.Views.Partials.transfer', $data);
    }

    /**
     * @param ModuleServices $moduleServices
     * @return mixed
     */
    function initPayment(ModuleServices $moduleServices)
    {
        return $moduleServices->callModule('Payment-IPayWallet')->renderView();
    }

    /**
     * @param Request $request
     * @return bool
     */
    function hasSufficientBalance(Request $request)
    {
        $totalAmount = 0;

        foreach ($request->input('payee.*') as $id => $payee) {
            $payee['wallet'] = $this->module->moduleId;
            $totalAmount += $payee['amount'] + array_sum(array_column($charges = defineFilter('PrIPayWalletTransaction', [], 'transactionTotal', $payee), 'amount'));
        }

        if ($this->module->getBalance(User::find(loggedId()), false) >= $totalAmount)
            return true;

        return false;
    }

    /**
     * get transaction list
     *
     * @param TransactionServices $transactionServices
     * @param Request $request
     * @return Factory|View
     */
    function getTransactionList(TransactionServices $transactionServices, Request $request)
    {
        $fromDate = loggedUser()->transactions()->first() ? loggedUser()->transactions()->first()->created_at->toDateString() : Carbon::now();
        $args = array_merge([
            'user' => loggedId(),
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

        $transactions = $transactionServices->getTransactions(collect($args)->except(['groupBy']))
            ->where(function ($query) {
                /** @var Builder $query */
                $query->whereHas('operation', function ($query) {
                    /** @var Builder $query */
                    $query->where('from_module', $this->module->moduleId)->where('payer', loggedId());
                })->orWhereHas('operation', function ($query) {
                    /** @var Builder $query */
                    $query->where('to_module', $this->module->moduleId)->where('payee', loggedId());
                });
            })->get()->toBase();

        $data['groupOfTransaction'] = $transactions->map(function ($value) use ($transactionServices) {
            /** @var Transaction $value */;
            return $transactionServices->bindExtraAttributes($value, $this->module);
        })->groupBy(function ($value) use ($data) {
            return $this->formatToGroupBy($value, $data['filters']['groupBy']['default']);
        });
        $data['moduleId'] = $this->module->moduleId;

        return view('Wallet.IPayWallet.Views.Partials.transactionList', $data);
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
            'payIn' => $this->module->credited(loggedUser())->sum('amount'),
            'payOut' => $this->module->debited(loggedUser())->sum('amount'),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.IPayWallet.Views.Partials.payInOutChart', $data);
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
            'walletSettings' => IPayWallet::where('user_id', loggedId())->first(),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.IPayWallet.Views.Partials.settings', $data);
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
            'walletSettings' => IPayWallet::where('user_id', loggedId())->first(),
            'moduleId' => $this->module->moduleId
        ];

        return view('Wallet.IPayWallet.Views.Partials.ipWhitelist', $data);
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
            'walletSettings' => IPayWallet::where('user_id', loggedId())->first(),
            'moduleId' => $this->module->moduleId
        ];

        if ($data['walletSettings']->transaction_password)
            return view('Wallet.IPayWallet.Views.Partials.passwordChange', $data);
        else
            return view('Wallet.IPayWallet.Views.Partials.setWalletPassword', $data);
    }

    /**
     * Change Submit Transaction Password
     *
     * @param Request $request
     * @return void
     */
    function submitTransactionPass(Request $request)
    {
        if (($validator = $this->validateCurrentTransactionPass($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        if (!Hash::check($request->input('transactionPass'), User::find(loggedId())->walletData->transaction_password)) {
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
        $tranPasswordData = $request->session()->get('tranPasswordData');
        IPayWallet::where('user_id', loggedId())->update(['transaction_password' => bcrypt($tranPasswordData['password'])]);
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
        $whitelistData = $request->session()->get('whitelistData');
        $data = [
            'ip_status' => $whitelistData['ipStatus'],
            'ip' => $whitelistData['ip']
        ];
        IPayWallet::where('user_id', loggedId())->update($data);
        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postIpWhitelistActions', 'ip_whitelist', $data);
        session()->forget(['whitelistData', 'walletAction']);
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

        return view('Wallet.IPayWallet.Views.Partials.checkTranPassword', $data);
    }

    /**
     * Set Transaction Password
     *
     * @param Request $request
     * @return void
     */
    function setTransactionPassword(Request $request)
    {
        if (($validator = $this->validateCurrentLoginPass($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        if (!Hash::check($request->input('loginPass'), User::find(loggedId())->password)) {
            $validator->errors()->add('loginPass', 'Login password entered is invalid');
            return response()->json($validator->errors(), 422);
        }
        $whitelistData = $request->session()->get('tranPasswordData');
        IPayWallet::where('user_id', loggedId())->update(['transaction_password' => bcrypt($whitelistData['password'])]);
        $data = [
            'module_id' => $this->module->moduleId
        ];
        defineAction('postChangeTransactionPasswordActions', 'change_transaction_password', $data);

        session()->forget(['tranPasswordData', 'walletAction']);
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

        return view('Wallet.IPayWallet.Views.Partials.checkLoginPassword', $data);
    }


    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    function checkIPayWalletPassword(Request $request)
    {
        if (Gate::denies('IPayWalletTransaction'))
            return response()->json(['status' => false, 'error' => _mt($this->module->moduleId, 'IPayWallet.Incorrect_transaction_password')], 401);

        if ($request->session()->has('walletAction')) {
            $method = $request->session()->get('walletAction');

            return app()->call([$this, $method]);
        }
    }


    /**
     * @param TransactionServices $transactionServices
     * @param Request $request
     * @param null $user
     * @return Factory|View
     */
    function getMemberTransactionList(TransactionServices $transactionServices, Request $request, $user = null)
    {
        if ($request->input('user_id'))
            $user = \App\Eloquents\User::find($request->input('user_id'));


        $data ['userId'] = $user ? $user->id : loggedId();

        $user = $user ?: loggedUser();
        $fromDate = $user->transactions()->first() ? $user->transactions()->first()->created_at->toDateString() : Carbon::now();

        $args = array_merge([
            'user' => $user->id,
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

        $transactions = $transactionServices->getTransactions(collect($args)->except(['groupBy']))
            ->where(function ($query) use ($user) {
                /** @var Builder $query */
                $query->whereHas('operation', function ($query) use ($user) {
                    /** @var Builder $query */
                    $query->where('from_module', $this->module->moduleId)->where('payer', $user->id);
                })->orWhereHas('operation', function ($query) use ($user) {
                    /** @var Builder $query */
                    $query->where('to_module', $this->module->moduleId)->where('payee', $user->id);
                });
            })->get()->toBase();

        $data['groupOfTransaction'] = $transactions->map(function ($value) use ($transactionServices) {
            /** @var Transaction $value */;
            return $transactionServices->bindExtraAttributes($value, $this->module);
        })->groupBy(function ($value) use ($data) {
            return $this->formatToGroupBy($value, $data['filters']['groupBy']['default']);
        });
        $data['moduleId'] = $this->module->moduleId;
        $data['user_id'] = $user->id;

        return view('Wallet.IPayWallet.Views.Partials.memberTransactionList', $data);
    }

}

<?php


namespace App\Components\Modules\Report\TopEarnersReport\Controllers;


use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Traits\View\Units;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class TopEarnersReportController
 * @package App\Components\Modules\Report\TopEarnersReport\Controllers
 */
class TopEarnersReportController extends Controller
{
    use Units;

    protected $allowedUnits = ['reportFilters', 'reportData', 'userEarningsInfo'];

    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'styles' => [
                asset('global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css'),
                asset('global/css/report-style.css'),
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'),
            ],
            'moduleId' => $this->getModule()->moduleId,
            'title' => _mt($this->getModule()->moduleId, 'TopEarnersReport.top_earners_report'),
            'heading_text' => _mt($this->getModule()->moduleId, 'TopEarnersReport.top_earners_report'),
            'breadcrumbs' => [
                _t('index.home') => getScope() . '.home',
                _mt($this->getModule()->moduleId, 'TopEarnersReport.Report') => getScope() . '.report.topEarners',
                _mt($this->getModule()->moduleId, 'TopEarnersReport.top_earners_report') => getScope() . '.report.topEarners'
            ],
        ];

        return view('Report.TopEarnersReport.Views.TopEarnersReportIndex', $data);
    }

    /**
     * @return ModuleBasicAbstract|mixed
     */
    function getModule()
    {
        return getModule('Report-TopEarnersReport');
    }

    /**
     * @return Factory|View
     */
    function unitReportFilters()
    {
        $data = [
            'moduleId' => $this->getModule()->moduleId,
        ];

        return view('Report.TopEarnersReport.Views.Partials.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function unitReportData(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'moduleId' => $this->getModule()->moduleId,
            'topEarners' => app()->call([$this, 'getTopEarners'], ['filters' => collect($filters)])->paginate(10)
        ];

        return view('Report.TopEarnersReport.Views.Partials.topEarnersReportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param UserServices $userServices
     * @return User|Builder|\Illuminate\Database\Eloquent\Collection
     */
    function getTopEarners(Collection $filters, UserServices $userServices)
    {
        $options = $filters;
        $transactionService = app(TransactionServices::class);
        $options = collect([
            'sortBy' => 'earnings'
        ])->merge($options);
        $query = User::query()->toBase();
        $payeeColumn = $query->getGrammar()->wrap((new Transaction)->getTable() . '.' . 'payee');
        $userColumn = $query->getGrammar()->wrap((new User)->getTable() . '.' . (new User)->getKeyName());
        isAdmin() ? $model = User::query() : $model = User::find(loggedId())->descendants([], 'sponsor', false);
        $usersQuery = $model->selectSub($transactionService->getTransactions(collect([
            'operation' => TransactionOperation::slugToId('commission')
        ]))->whereRaw("$payeeColumn = $userColumn")->selectRaw('SUM(`amount`)')->getQuery(), 'earnings');

        return $userServices->getUsers($options, $usersQuery, $returnQuery = true);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function unitUserEarningsInfo(IndexController $controller, Request $request, ModuleServices $moduleServices, TransactionServices $transactionServices)
    {
        $user = User::find($request->input('userId'));
        $filters = collect([
            'user' => [$user->id, 'payee'],
            'operation' => TransactionOperation::slugToId('commission')
        ]);
        $options = $filters;
        $transactions = $transactionServices->getTransactions($options);
        $availableCommissions = $moduleServices->getCommissionPool('active');
        $groupedTransactions = $transactions->get()->groupBy(function ($transaction) {
            /** @var Transaction $transaction */
            if (isset($transaction->commission->module_id))
                return getModule((int)$transaction->commission->module_id)->getRegistry()['key'];
        })->map(function ($group) {
            /** @var Collection $group */
            return $group->sum('amount');
        });
        $nullCommissions = array_filter($availableCommissions, function ($commission) use ($groupedTransactions) {
            /** @var ModuleBasicAbstract $commission */
            return !in_array($commission->getRegistry()['key'], (array)$groupedTransactions->keys()->toArray());
        });
        $data = [
            'user' => $user,
            'transactions' => array_merge($controller->formatToArrayForGraph($groupedTransactions), array_map(function ($commission) {
                /** @var ModuleBasicAbstract $commission */
                return [$commission->getRegistry()['key'], 0];
            }, $nullCommissions)),
            'earnedAmount' => $transactions->get()->sum('amount'),
            'moduleId' => $this->getModule()->moduleId,
        ];

        return view('Report.TopEarnersReport.Views.Partials.userEarningsInfo', $data);
    }
}

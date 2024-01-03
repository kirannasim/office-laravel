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

namespace App\Http\Controllers\User;

use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\MailServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\UtilityServices;
use App\Blueprint\Traits\Graph\DateTimeFormatter;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Eloquents\OrderTotal;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionOperation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @package App\Http\Controllers\User
 */
class IndexController extends Controller
{
    use DateTimeFormatter;

    /**
     * @return Factory|View
     */
    public function index()
    {
        $user = loggedUser();

        $highestRank = AdvancedRankAchievementHistory::where('user_id', $user->id)->orderBy('rank_id', 'desc')->get()->first();
        $data = [
            'filterBy' => 'year',
            'currentRank' => $user->rank,
            'package' => $user->package,
            'highestRank' => $highestRank,
            'active' => $user->repoData,
            'today' => date("Y/m/d"),
        ];

        $sortingKeys = collect([
            'Commission-DirectEnrollerCommission' => 1, // DEC
            'Commission-PerformanceFeeCommission' => 2, // PFC
            'Commission-SponsorLevelCommission' => 3, // SLC
            'Commission-TeamVolumeCommission' => 4, // PFC
            'Commission-GenerationMatchingBonus' => 5, // DCU
            'Commission-QuartelyBonusPool' => 6, // QBP ??? WAS COMMENTED
            'Commission-DiamondBonusPool' => 7, // DBP
            'Commission-PFCCommission' => 8
        ]);
        
        $moduleServices = app(ModuleServices::class);
        $commissionModules = $moduleServices->getCommissionPool('active');
        foreach ($commissionModules as $key => $eachCommission) {
            if ($eachCommission->registry['slug'] === 'Commission-StarPFCPoolBonus') {
                unset($commissionModules[$key]);
            }

        }
        $commissionModules = array_sort($commissionModules, static function (ModuleBasicAbstract $commission) use ($sortingKeys) {
            return $sortingKeys->get($commission->getRegistry(true)->get('slug'));
        });


        $commissionOperationId = TransactionOperation::where('slug', 'commission')->first()->id;
        $data['commissionTotal'] = Transaction::where('payee', loggedId())->where('status', 1)->with(['operation', 'commission'])
            ->wherehas('operation', function ($query) use ($commissionOperationId) {
                /** @var Builder $query */
                $query->where('operation_id', $commissionOperationId);
            })->sum('amount');

        $data['title'] = _t('index.dashboard');


        $data['commissions'] = collect(array_map(function (CommissionModuleInterface $module) {
            $yearly = $module->credited(loggedUser())
                ->whereYear('created_at', Carbon::now()->year);
            return [
                'commission' => $module,
                'yearly' => $yearly->sum('amount'),
                'monthly' => $yearly->whereMonth('created_at', Carbon::now()->month)->sum('amount'),
                'eligibility' => $module->isUserEligible(loggedUser())
            ];
        }, $commissionModules));

        $data['user'] = loggedUser();

        $data['cycle'] = app(BinaryServices::class)->getPairCount(['fromDate' => Carbon::now()->firstOfMonth(),
            'toDate' => Carbon::now()->lastOfMonth(), 'user' => loggedId()]);

        $data['ranks'] = AdvancedRank::get();
        $data['userRanks'] = AdvancedRankUser::where('user_id', loggedId())->distinct('rank_id')->pluck('rank_id')->toArray();
        $data['heading_text'] = _t('index.dashboard');
        $data['breadcrumbs'] = [_t('index.home') => 'user.home', _t('index.dashboard') => 'user.home'];

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

        return view('User.Dashboard.index', $data);
    }

    public function change_autoplace()
    {
        $user = loggedUser();
        $position = $_POST['position'];

        $user->repoData->update(['default_binary_position'=>$position]);

        return ['success'=>true];
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    function requestUnit(Request $request)
    {
        if (!$unit = $request->input('unit')) {
            return response('Action not allowed!');
        }

        defineAction('dashboardLayout', 'unitAction', $unit);

        return defineFilter('dashboardLayout', method_exists($this, $unit) ? app()->call([$this, $unit], (array)$request->input('args')) : '', 'unitFilter', $unit);
    }

    /**
     * @return Factory|View
     */
    function businessInfo()
    {
        $data = [];
        return view('Admin.Dashboard.Partials.businessInfo', $data);
    }

    /**
     * @param Request $request
     * @param MailServices $mailServices
     * @return Factory|View
     */
    function mailDetailedGraph(Request $request, MailServices $mailServices)
    {
        $filters = collect([
            'groupBy' => 'month',
            'orderBy' => 'ASC',
            'fromDate' => Carbon::now()->startOfYear(),
            'filterBy' => 'year',
            'user' => loggedId()
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
            if ($datum->keys()->count()) {
                array_push($xAxises, ...$datum->keys());
            }

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

        return view('User.Dashboard.Partials.DetailedGraphs.mailStats', $data);
    }

    /**
     * @param Collection $data
     * @param string $groupBy
     * @param string $totalColumn
     * @return Collection
     */
    function prepareShortGraphData(Collection $data, $groupBy, $totalColumn = 'total')
    {
        return $data->mapWithKeys(function ($value) use ($groupBy, $totalColumn) {
            $total = $value->{$totalColumn};

            switch ($groupBy) {
                case 'hour':
                    return [$value->created_at->format('H') => $total];
                    break;
                case 'day':
                    return [$value->created_at->format('D') => $total];
                    break;
                case 'month':
                    return [$value->created_at->format('M') => $total];
                    break;
                case 'year':
                    return [$value->created_at->format('Y') => $total];
                    break;
                default:
                    return [$value->created_at => $value];
                    break;
            }
        });
    }

    /**
     * @param Arrayable $data
     * @return array
     */
    function formatToArrayForGraph(Arrayable $data)
    {
        $dispatch = [];

        foreach ($data as $key => $value) {
            $dispatch[] = [$key, $value];
        }

        return $dispatch;
    }

    /**
     * @param Collection $data
     * @param $groupBy
     * @return mixed
     */
    function sortData(Collection $data, $groupBy)
    {
        $compareData = [];

        switch ($groupBy) {
            case 'month':
                $compareData = $this->getMonths();
                break;
            case 'day':
                $compareData = $this->getDays();
                break;
        }

        if ($groupBy == 'year') {
            return $data->unique()->sort()->values();
        }

        return $data->unique()->sortBy(function ($value) use ($compareData) {
            return array_search($value, $compareData);
        })->values();
    }

    /**
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return Factory|View
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

        return view('User.Dashboard.Partials.activities', $data);
    }


    function transactionTable(Request $request)
    {

        $filter = [
            'commissionId' => $request->input('commissionId')
        ];
        $data['commissionData'] = app()->call([$this, 'fetchCommissionData'], ['filters' => collect($filter), 'pages' => $request->input('totalToShow', 5)]);

        return callModule((int)$request->input('commissionId'))->commissionTable($data['commissionData']);

//        return view('User.Dashboard.Partials.commissionTable', $data);
    }


    public function fetchCommissionData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return Transaction::where('payee', loggedId())->where('status', 1)->with(['operation', 'commission'])
            ->wherehas('commission', function ($query) use ($filters) {
                /** @var Builder $query */
                $query->where('module_id', $filters->get('commissionId'));
            })->{$method}($pages);

    }


}

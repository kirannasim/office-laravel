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

namespace App\Http\Controllers\Admin;

use App\Blueprint\Services\MailServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\TaskServices;
use App\Blueprint\Services\UtilityServices;
use App\Blueprint\Traits\Graph\DateTimeFormatter;
use App\Blueprint\Traits\Graph\GraphHelper;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Eloquents\Package;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @package App\Http\Controllers\Admin
 */
class IndexController extends Controller
{
    use DateTimeFormatter, GraphHelper;

    /**
     * @param BinaryServices $binaryServices
     * @return Factory|View
     */
    public function index(BinaryServices $binaryServices)
    {
        //callmodule('Commission-TeamVolumeCommission','distributeMissedCommission');die;
        //callmodule('Commission-GenerationMatchingBonus','process', ['data' => ['user' => User::find(9), 'amount' => 200]]);die;
        // callmodule('Commission-SponsorLevelCommission','process', ['data' => ['user' => User::find(9), 'scope' => 'registration']]);die;
        //callmodule('Commission-DiamondBonusPool','process');die;
        //callmodule('Commission-TeamVolumeCommission','distributePending');die;
        //callmodule('Rank-AdvancedRank','process', ['data' => ['user' => User::find(35)]]);
        /*defineAction('postRegistration', 'registration', collect(['result' => [
            'user' => User::find(56)
        ]]));die;*/
        //callmodule('Commission-PerformanceFeeCommission','process');die;
        //callmodule('Commission-StarPFCPoolBonus','process');die;
        /* $ceilingRate = getModule('Commission-TeamVolumeCommission')->getModuleData()['ceiling_rate'];
         $maximumCycleCap = loggedUser()->rank ? $ceilingRate[loggedUser()->rank->rank_id] : 0;
         $completedCycle = $binaryServices->getPairCount(['user' => loggedId(), 'fromDate' => Carbon::now()->startOfMonth(), 'toDate' => Carbon::now()->format('Y-m-d 23:59:59')]);
         $pendingCycle = $maximumCycleCap ? $maximumCycleCap - $completedCycle : 0;*/

        $data = [
            'title' => _t('index.dashboard'),
            'heading_text' => _t('index.dashboard'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('index.dashboard') => 'admin.home'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/plugins/chartjs-master/dist/Chart.bundle.min.js'),
                asset('global/plugins/countUpJS/dist/countUp.min.js'),
                asset('global/plugins/clipboard.js-master/dist/clipboard.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.css'),
                asset('global/plugins/morris/morris.css'),
                asset('global/plugins/fullcalendar/fullcalendar.min.css'),
                asset('global/plugins/jqvmap/jqvmap/jqvmap.css'),
            ],
            'filterBy' => 'year',
            'packagedUsers' => collect(User::selectRaw('package_id, count(*) as total')->groupBy('package_id')->get()->mapWithKeys(function ($users) {
                return [$users->package_id => $users->total];
            })),
            'packages' => Package::get(),
            'pending' => 0,
        ];

        return view('Admin.Dashboard.index', $data);
    }

    function testTask()
    {
        /** @var TaskServices $taskServices */
        $taskServices = app(TaskServices::class);
        $task = $taskServices->createTask([
            'taskName' => 'New test task',
            'taskDescription' => 'Real time task running',
            'startedAt' => Carbon::now(),
            'taskId' => uniqid('task-'),
        ]);

        $task->setTotalOperations(100);
        $self = $this;

        for ($i = 0; $i <= 100; $i++) {
            $operationName = 'Task - ' . $i + 1 . ' is running ';
            $task->addJob($operationName, function ($operation) use ($i, $self) {
                /** @var Operation $operation */
                // validate user data and setting errors if any
                if ($i == 65) {
                    sleep(2);
                    return $operation->setErrors([
                        'Task is not completed properly'
                    ])->abort('Error occurred!', 65);
                }
                sleep(2);
                $operation->setCurrentStage('finished task ' . $i);
            })->run();
        }

        $task->finish();
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    function requestUnit(Request $request)
    {
        if (!$unit = $request->input('unit')) return response('Action not allowed!');

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

        return view('Admin.Dashboard.Partials.DetailedGraphs.mailStats', $data);
    }

    /**
     * @param ModuleServices $moduleServices
     * @return Factory|View
     */
    function systemModules(ModuleServices $moduleServices)
    {
        $data = [
            'totalModules' => $totalModules = ModuleServices::$totalModules,
            'premiumModules' => $premiumModules = $moduleServices->filteredModules(collect([
                'registry' => [
                    ['class', 'premium'],
                ]
            ])),
            'inactiveModules' => $inactiveModules = $moduleServices->filteredModules(collect([
                'registry' => [
                    ['active', false],
                    ['moduleId', false, '!='],
                ]
            ])),
            'modulesToBeInstalled' => $modulesToBeInstalled = $moduleServices->filteredModules(collect([
                'registry' => [
                    ['active', false],
                    ['moduleId', false],
                ]
            ])),
            'pools' => $pools = $moduleServices->getPools(),
            'emptyPools' => count($pools) - count($moduleServices->getPools(true)),
            'statusComparisonGraph' => [
                ['Active', $totalModules - count($inactiveModules)],
                ['Inactive', count($inactiveModules)],
                ['Not installed', count($modulesToBeInstalled)],
            ]
        ];

        return view('Admin.Dashboard.Partials.systemModules', $data);
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

        return view('Admin.Dashboard.Partials.activities', $data);
    }
}

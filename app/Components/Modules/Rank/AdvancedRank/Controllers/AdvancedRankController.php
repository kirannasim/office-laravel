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

namespace App\Components\Modules\Rank\AdvancedRank\Controllers;

use App\Components\Modules\Rank\AdvancedRank\AdvancedRankIndex as Module;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankBenefit;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankPersonalize;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankPersonalizeHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits\DownloadReport;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits\Validations;
use App\Eloquents\Country;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class AdvancedRankController
 * @package App\Components\Modules\Rank\AdvancedRank\Controllers
 */
class AdvancedRankController extends Controller
{
    use DownloadReport, Validations;

    /**
     * BasicRankController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @return Factory|View
     */
    function rankConfiguration()
    {
        $data = [
            'scripts' => [],
            'benefits' => AdvancedRankBenefit::get(),
            'ranks' => AdvancedRank::get(),
            'moduleId' => $this->module->moduleId,
        ];
        return view('Rank.AdvancedRank.Views.Partials.rankConfiguration', $data)->render();
    }

    /**
     * @param Request $request
     * @return bool
     */
    function rankConfigurationSave(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $validator = Validator::make($request->all(), $this->rankConfigValidationRules(), $this->rankConfigValidationMessages(), $this->rankConfigValidationAttributes());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        AdvancedRank::query()->whereNotIn('id', array_column($request->input('ranks'), 'id'))->delete();
        array_map(function ($entry) {
            AdvancedRank::updateOrCreate(['id' => $entry['id']], $entry);
        }, $request->input('ranks'));
    }

    /**
     * @return Factory|View
     */
    function benefitConfig()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'benefits' => AdvancedRankBenefit::get(),
            'moduleId' => $this->module->moduleId,
        ];

        return view('Rank.AdvancedRank.Views.Partials.rankBenefitConfig', $data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function rankBenefitConfigurationSave(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $validator = Validator::make($request->all(), $this->rankBenefitValidationRules(), $this->rankBenefitValidationMessages(), $this->rankBenefitValidationAttributes());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        array_map(function ($entry) {
            AdvancedRankBenefit::updateOrCreate(['id' => $entry['id']], $entry);
        }, $request->input('benefits'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updatePersonalizedSettings(Request $request)
    {
        if (($validator = $this->validatorPersonalizedSettings($request)) && $validator->fails())
            return $validator->errors();

        AdvancedRankPersonalize::updateOrCreate(['user_id' => $request->input('userId')], ['rank_id' => $request->input('userId'), 'rank_id' => $request->input('defaultRank')]);

        AdvancedRankPersonalizeHistory::create([
            'user_id' => $request->input('userId'),
            'rank_id' => $request->input('defaultRank')
        ]);

        AdvancedRankUser::updateOrCreate(['user_id' => $request->input('userId')], ['rank_id' => $request->input('userId'), 'rank_id' => $request->input('defaultRank')]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function validatorPersonalizedSettings(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationPersonalizedSettingsRules(), $this->validationPersonalizedSettingsMessages(), $this->validationPersonalizedSettingsMessages());

        return $validator;
    }

    /**
     * @return Factory|View
     */
    public function rankReportIndex()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
            'title' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'heading_text' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'AdvancedRank.Report') => 'advancedRankReport',
                _mt($this->module->moduleId, 'AdvancedRank.rank_report') => 'advancedRankReport'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.rankReportIndex', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function rankReportFilters(Request $request)
    {
        $data = [
            'default_filter' => [
                'ranks' => AdvancedRank::all(),
                'countries' => getCountries(),
                'startDate' => AdvancedRankUser::min('created_at'),
                'endDate' => AdvancedRankUser::max('created_at'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.Partials.RankReport.filters', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function fetchRankReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'rankData' => app()->call([$this, 'fetchRankReportData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.Partials.RankReport.reportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchRankReportData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return AdvancedRankUser::with('rank', 'user','user.rankHistory', 'user.repoData.sponsorUser', 'user.metaData', 'user.metaData.country')
            ->whereHas('user', function ($query) {
                /** @var Builder $query */
                $query->has('rankHistory', '>' , 1);
            })
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            })->when($rank = $filters->get('ranks'), function ($query) use ($rank) {
                /** @var Builder $query */
                $query->whereIn('rank_id', $rank);
            })->when($memberId = $filters->get('memberId'), function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->whereHas('user', function ($query) use ($memberId) {
                    /** @var Builder $query */
                    $query->where('customer_id', $memberId);
                });
            })->when($country = $filters->get('countries'), function ($query) use ($country) {
                /** @var Builder $query */
                $query->whereHas('user.metaData', function ($query) use ($country) {
                        /** @var Builder $query */
                        $query->whereIn('country_id', $country);
                });
            })->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })->{$method}($pages);
    }

    /**
     * @return Factory|View
     */
    public function rankAchievementHistoryReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'heading_text' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'AdvancedRank.Report') => 'advancedRankAchievementHistoryReport',
                _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report') => 'advancedRankAchievementHistoryReport'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.rankAchievementReportIndex', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function rankAchievementHistoryReportFilters(Request $request)
    {
        $data = [
            'default_filter' => [
                'ranks' => AdvancedRank::all(),
                'startDate' => AdvancedRankAchievementHistory::min('created_at') ? AdvancedRankAchievementHistory::min('created_at') : Carbon::now(),
                'endDate' => AdvancedRankAchievementHistory::max('created_at') ? AdvancedRankAchievementHistory::max('created_at') : Carbon::now(),
                'countries' => Country::all(),
            ],
            'moduleId' => $this->module->moduleId,
        ];

        return view('Rank.AdvancedRank.Views.Partials.RankAchievementReport.filters', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function fetchRankAchievementHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'rankAchievedData' => app()->call([$this, 'fetchRankAchievementHistoryReportData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.Partials.RankAchievementReport.reportTable', $data);
    }

    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchRankAchievementHistoryReportData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return AdvancedRankAchievementHistory::with('user.rankHistory', 'user.rankHistory.rank', 'user.metaData', 'rank', 'user', 'country')
        ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->when($rank = $filters->get('rank'), function ($query) use ($rank) {
            /** @var Builder $query */
            $query->where('rank_id', $rank);
        })->when($filters->get('date'), function ($query) use ($filters) {
            $dates = explode(' - ', $filters->get('date'));
            if (isset($dates[0]))
                $query->whereDate('created_at', '>=', $dates[0]);
            if (isset($dates[1]))
                $query->whereDate('created_at', '<=', $dates[1]);
        })->when($memberId = $filters->get('memberId'), function ($query) use ($memberId) {
            /** @var Builder $query */
            $query->whereHas('user', function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->where('customer_id', $memberId);
            });
        })->when($country = $filters->get('country_ids'), function ($query) use ($country) {
            /** @var Builder $query */
            $query->whereHas('user.metaData', function ($query) use ($country) {
                /** @var Builder $query */
                $query->whereIn('country_id', $country);
            });
        })->{$method}($pages);
    }

    /**
     * @return Factory|View
     */
    public function totalRankSummaryReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'AdvancedRank.total_rank_summary_report'),
            'heading_text' => _mt($this->module->moduleId, 'AdvancedRank.total_rank_summary_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'AdvancedRank.Report') => 'totalRankSummaryReport',
                _mt($this->module->moduleId, 'AdvancedRank.total_rank_summary_report') => 'totalRankSummaryReport'
            ],
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId
        ];
        return view('Rank.AdvancedRank.Views.totalRankSummaryIndex', $data);
    }


    public function totalRankSummaryReportFilters()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'countries'=>Country::all()
        ];
        return view('Rank.AdvancedRank.Views.Partials.TotalRankSummaryReport.filters',$data);
    }

    public function fetchTotalRankSummaryReport(Request $request){

        $filters = $request->input('filters');


        $data = [
            'totalCounts' => $this->totalRankCount(collect($filters)),
            'rankCounts'  => app()->call([$this, 'fetchTotalRankSummaryReportData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId'    => $this->module->moduleId
        ];

        return view('Rank.AdvancedRank.Views.Partials.TotalRankSummaryReport.reportTable',$data);
    }


    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchTotalRankSummaryReportData(Collection $filters)
    {


        $status = $filters->get('status')!=null ? $filters->get('status') : 2;

        $ranks = AdvancedRank::when(in_array($status,[0,1]), function ($query) use ($status) {
            /** @var Builder $query */
            $query->where('is_active', $status);
        })->get();

        $data = [];
        if (count($ranks)>0) {
            foreach ($ranks as $rank) {
                $data[$rank->id]['name'] = $rank->name;
                for ($i = 1; $i <= 12; $i++) {
                    $data[$rank->id]['count'][$i] = AdvancedRankAchievementHistory::
                    when($country = isset($filters['country_ids']) ? $filters['country_ids'] : false, function ($query) use ($country) {
                        /** @var Builder $query */
                        $query->whereHas('userMeta', function ($query) use ($country) {
                            /** @var Builder $query */

                            return $query->whereIn('country_id', array_values($country));
                        });
                    })->where('rank_id', $rank->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
                }
            }
        }
        return $data;
    }
    /**
     * @return mixed
     */
    public function getRankCount()
    {
        $ranks = AdvancedRank::all();
        foreach ($ranks as $rank) {
            $data[$rank->id]['name'] = $rank->name;
            for ($i = 1; $i <= 12; $i++) {
                $data[$rank->id]['count'][$i] = AdvancedRankAchievementHistory::where('rank_id', $rank->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
            }
            //$data['rank'] = AdvancedRank::all();
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function totalRankCount(Collection $filters)
    {
        $months = [];


        $status = $filters->get('status') != null ? $filters->get('status') : 2;
        $ranks = AdvancedRank::when(in_array($status, [0, 1]), function ($query) use ($status) {
            /** @var Builder $query */
            return $query->where('is_active', $status);
        })->get();

        $months = [];
        if (count($ranks)>0) {
            for ($i = 1; $i <= 12; $i++) {
                foreach ($ranks as $rank) {
                    $data[$rank->id][$i] = AdvancedRankAchievementHistory::when($country = isset($filters['country_ids']) ? $filters['country_ids'] : false, function ($query) use ($country) {
                        /** @var Builder $query */
                        $query->whereHas('userMeta', function ($query) use ($country) {
                            /** @var Builder $query */

                            return $query->whereIn('country_id', array_values($country));
                        });
                    })->where('rank_id', $rank->id)->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();
                }
                $months[$i] = array_sum(array_column($data, $i));
            }
        }
        return $months;
    }

    function downloadExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'totalCounts' => $this->totalRankCount(collect($filters)),
            'rankCounts'  => app()->call([$this, 'fetchTotalRankSummaryReportData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId,
        ];

        $excel = Excel::create($fileName = 'AdvancesRankReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Rank.AdvancedRank.Views.Partials.TotalRankSummaryReport.exportView', $data);
            });
        })->store('xls', public_path($relativePath = 'downloads'));

        return response()->json(['link' => asset($relativePath) . '/' . $fileName . '.' . $excel->ext]);
    }
}

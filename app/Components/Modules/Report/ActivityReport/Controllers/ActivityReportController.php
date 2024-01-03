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

namespace App\Components\Modules\Report\ActivityReport\Controllers;

use App\Blueprint\Services\ActivityServices;
use App\Components\Modules\Report\ActivityReport\ActivityReportIndex as Module;
use App\Eloquents\Activity;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use phpseclib\File\ASN1\Element;

/**
 * Class JoiningReportController
 * @package App\Components\Modules\Report\ActivityReport\Controllers
 */
class ActivityReportController extends Controller
{

    private $module;

    /**
     * __construct function
     */
    public function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * get index page of activity report
     *
     * @return Factory|View
     */
    public function index()
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

        $data['title'] = _mt($this->module->moduleId, 'ActivityReport.activity_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'ActivityReport.activity_report');
        $data['breadcrumbs'] = [
            _t('index.home') => getScope() . '.home',
            _mt($this->module->moduleId, 'ActivityReport.Report') => getScope() . '.report.activity',
            _mt($this->module->moduleId, 'ActivityReport.activity_report') => getScope() . '.report.activity'
        ];

        return view('Report.ActivityReport.Views.ActivityReportIndex', $data);
    }

    /**
     * load filters to the index page
     *
     * @return Factory|View
     */
    public function filters()
    {
        $data = [
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => Carbon::now(), // User::max('created_at')
            ],
            'moduleId' => $this->module->moduleId
        ];

        $exceptActivities = $this->exceptActivities();

        $data['activities'] = Activity::get()->filter(function ($activity) use ($exceptActivities) {
            return !in_array($activity->operation, $exceptActivities[getScope()], true);
        });

        return view('Report.ActivityReport.Views.Partials.filter', $data);
    }

    /**
     * @return array
     */
    public function exceptActivities(): array
    {
        return [
            'user' => [
                'registration', 'module_installed', 'module_activated', 'module_deactivated', 'module_uninstalled', 'module_config_updated',
                'profile_update', 'member_password_changed', 'settings_updated', 'package_updated', 'theme_installed', 'theme_uninstalled', 'theme_changed', 'menu_updated'
            ],
            'admin' => [
                'module_installed', 'module_activated', 'module_deactivated', 'module_uninstalled', 'module_config_updated', 'settings_updated',
                'package_updated','profile_update', 'theme_installed', 'theme_uninstalled', 'theme_changed', 'menu_updated'
            ],
            'employee' => [
                'registration', 'module_installed', 'module_activated', 'module_deactivated', 'module_uninstalled', 'module_config_updated', 'settings_updated',
                'package_updated', 'theme_installed', 'theme_uninstalled', 'theme_changed', 'menu_updated', 'fund_transfer'
            ]
        ];
    }

    /**
     * fetch the report table
     *
     * @param Request $request
     * @return Factory|View
     */
    public function fetch(Request $request)
    {
        $filters = $request->input('filters');
        if (getScope() !== 'admin') {
            $filters['user_id'] = loggedId();
        }

        $data['activities'] = app()->call([$this, 'fetchActivities'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]);
        $data['moduleId'] = $this->module->moduleId;

        foreach ($data['activities'] as $activity) {
            $activity->changes = [];
            if (count($activity->data)) {
                $changes = [];

                if (isset($activity->data['updated_meta_info']) || isset($activity->data['prev_meta_info'])) {
                    $changed_fields = array_keys(array_diff($activity->data['updated_meta_info'] ?? [], $activity->data['prev_meta_info'] ?? []));
                    foreach ($changed_fields as $changed_field) {
                        $changes[$changed_field] = [
                            'from' => $activity->data['prev_meta_info'][$changed_field] ?? '',
                            'to' => $activity->data['updated_meta_info'][$changed_field] ?? '',
                        ];
                    }
                }

                if (isset($activity->data['updated_basic_info']) || isset($activity->data['prev_basic_info'])) {
                    $changed_fields = array_keys(array_diff($activity->data['updated_basic_info'] ?? [], $activity->data['prev_basic_info'] ?? []));
                    foreach ($changed_fields as $changed_field) {
                        $changes[$changed_field] = [
                            'from' => $activity->data['prev_basic_info'][$changed_field] ?? '',
                            'to' => $activity->data['updated_basic_info'][$changed_field] ?? '',
                        ];
                    }
                }

                $activity->changes = $changes;
            }
        }

        return view('Report.ActivityReport.Views.Partials.ActivityReportTable', $data);
    }

    /**
     * fetch sales data
     *
     * @param Collection $filters
     * @param ActivityServices $activityServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchActivities(Collection $filters, ActivityServices $activityServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $activityServices->getActivities(collect([]))
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('on_user_id', $userId);
            })->when($activity = $filters->get('activity_id'), function ($query) use ($activity) {
                /** @var Builder $query */
                $query->where('activity_id', $activity);
            })->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })->when(!$activity, function ($query) {
                $exceptActivities = $this->exceptActivities();
                $activities = Activity::get()->filter(function ($activity) use ($exceptActivities) {
                    return !in_array($activity->operation, $exceptActivities[getScope()]);
                });
                /** @var Builder $query */
                $query->whereIn('activity_id', $activities->pluck('id'));
            })->when($memberId = $filters->get('memberId'), function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->whereHas('user', function ($query) use ($memberId) {
                    /** @var Builder $query */
                    $query->where('customer_id', $memberId);
                });
            })->{$method}($pages);
    }
}

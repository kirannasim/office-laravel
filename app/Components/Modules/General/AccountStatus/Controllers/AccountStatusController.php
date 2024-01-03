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

namespace App\Components\Modules\General\AccountStatus\Controllers;

use App\Components\Modules\General\AccountStatus\AccountStatusIndex as Module;
use App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory;
use App\Eloquents\User;
use App\Eloquents\UserPermission;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class AccountStatusController
 * @package App\Components\Modules\General\AccountStatus\Controllers
 */
class AccountStatusController extends Controller
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
     * @param Request $request
     * @return mixed
     */
    function saveAccountStatus(Request $request)
    {
        if (isDemoVersion()) return response()->json([], 403);

        $validator = Validator::make($request->all(), ['member_status' => 'required']);
        if ($validator->fails())
            return $validator->errors();

        $user_id = $request->member_id;

        switch ($request->member_status) {
            case 'active' :
                $accountStatus = ['login' => 0, 'commission' => 0, 'payout' => 0, 'fund_transfer' => 0];
                break;
            case 'inactive' :
                $accountStatus = ['login' => 1, 'commission' => 1, 'payout' => 0, 'fund_transfer' => 0];
                break;
            case 'terminated' :
                $accountStatus = ['login' => 1, 'commission' => 1, 'payout' => 1, 'fund_transfer' => 1];
                break;
            case 'custom' :
                $accountStatus['login'] = isset($request->login_status) ? 1 : 0;
                $accountStatus['payout'] = isset($request->payout_status) ? 1 : 0;
                $accountStatus['commission'] = isset($request->commission_status) ? 1 : 0;
                $accountStatus['fund_transfer'] = isset($request->fund_transfer_status) ? 1 : 0;
                break;
        }
        foreach ($accountStatus as $key => $value) {
            if ($user = UserPermission::where('user_id', $user_id)->where('slug', $key)->first()) {
                UserPermission::where('user_id', $user_id)->where('slug', $key)->update(['title' => $request->member_status, 'status' => $value]);
            } else {
                UserPermission::create(['user_id' => $user_id, 'title' => $request->member_status, 'slug' => $key, 'status' => $value]);
            }
        }

        AccountStatusHistory::create(['user_id' => $user_id, 'status' => $request->member_status, 'permissions' => $accountStatus]);

    }


    /** get index for account status change history report
     *
     * @return Factory|View
     */
    function accountStatusHistoryReportIndex()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
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

        $data['title'] = _mt($this->module->moduleId, 'AccountStatus.account_status_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'AccountStatus.account_status_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'AccountStatus.Report') => 'accountStatusReport',
            _mt($this->module->moduleId, 'AccountStatus.account_status_report') => 'accountStatusReport'
        ];

        return view('General.AccountStatus.Views.accountStatusReportIndex', $data);
    }

    /**
     * fetch filters for account status history report
     *
     * @param Request $request
     * @return Factory|View
     */
    function accountStatusHistoryFilters(Request $request)
    {
        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        $data = [
            'default_filter' => [
                'startDate' => AccountStatusHistory::count() ? AccountStatusHistory::min('created_at') : Carbon::now(),
                'endDate' => AccountStatusHistory::count() ? AccountStatusHistory::max('created_at') : Carbon::now(),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('General.AccountStatus.Views.Partials.accountStatusHistory.accountStatusReportFilters', $data);
    }
    /** @noinspection PhpMethodNamingConventionInspection */

    /**
     * fetch partial table for account status change history report
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchAccountStatusHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountHistoryData' => app()->call([$this, 'fetchAccountStatusHistoryData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.AccountStatus.Views.Partials.accountStatusHistory.accountStatusReportTable', $data);
    }

    /**
     *
     * @param Collection $filters
     * @param int $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchAccountStatusHistoryData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        return AccountStatusHistory::when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->when($filters->get('date'), function ($query) use ($filters) {
            /** @var Builder $query */
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
        })->{$method}($pages);
    }
    /** @noinspection PhpMethodNamingConventionInspection */


    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadAccountStatusHistoryReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'accountHistoryData' => app()->call([$this, 'fetchAccountStatusHistoryData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.account_status_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.AccountStatus.Views.Partials.accountStatusHistory.exportView', $data));
        $fileName = 'AccountStatusReport-' . date('Y-m-d-h-i-s') . '.pdf';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);
        $pdf->save($relativePath);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }/** @noinspection PhpMethodNamingConventionInspection */


    /**
     * save the report as Excel
     *
     * @param Request $request
     * @return string
     */
    function downloadAccountStatusHistoryReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountHistoryData' => app()->call([$this, 'fetchAccountStatusHistoryData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.account_status_report'),
            'displayLogo' => false
        ];

        $fileName = 'AccountStatusReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.AccountStatus.Views.Partials.accountStatusHistory.exportView', $data);
            });
        })->store('xlsx', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.xlsx';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }/** @noinspection PhpMethodNamingConventionInspection */

    /**
     * save the report as csv
     *
     * @param Request $request
     * @return string
     */
    function downloadAccountStatusHistoryReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountHistoryData' => app()->call([$this, 'fetchAccountStatusHistoryData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.account_status_report'),
            'displayLogo' => false
        ];

        $fileName = 'AccountStatusReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.AccountStatus.Views.Partials.accountStatusHistory.exportView', $data);
            });
        })->store('csv', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.' . $excel->ext;
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }/** @noinspection PhpMethodNamingConventionInspection */

    /**
     * print report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printAccountStatusHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountHistoryData' => app()->call([$this, 'fetchAccountStatusHistoryData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.account_status_report'),
            'displayLogo' => true
        ];

        return view('General.AccountStatus.Views.Partials.accountStatusHistory.exportView', $data);
    }


    /**
     * current account status report index
     *
     * @return Factory|View
     */
    function currentAccountStatusRportIndex()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
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

        $data['title'] = _mt($this->module->moduleId, 'AccountStatus.current_account_status_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'AccountStatus.current_account_status_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'AccountStatus.Report') => 'currentAccountStatusReport',
            _mt($this->module->moduleId, 'AccountStatus.account_status_report') => 'currentAccountStatusReport'
        ];

        return view('General.AccountStatus.Views.currentAccountStatusReportIndex', $data);
    }

    /**
     * current account status report filters
     *
     * @return Factory|View
     */
    function currentAccountStatusReportFilters()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];

        return view('General.AccountStatus.Views.Partials.currentAccountStatusHistory.currentAccountStatusReportFilters', $data);
    }

    /**
     * get current account status report table
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchAccountStatusReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountStatusData' => app()->call([$this, 'fetchCurrentAccountStatusData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.AccountStatus.Views.Partials.currentAccountStatusHistory.currentAccountStatusReportTable', $data);
    }

    /**
     * get current account status data
     *
     * @param Collection $filters
     * @return mixed
     */
    function fetchCurrentAccountStatusData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';
        return UserPermission::when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->groupBy('user_id')->{$method}($pages);

    }

    /**
     * download current account status report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadCurrentAccountStatusHistoryReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'accountStatusData' => app()->call([$this, 'fetchCurrentAccountStatusData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.current_account_status_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.AccountStatus.Views.Partials.currentAccountStatusHistory.exportView', $data));
        $fileName = 'currentAccountStatusReport-' . date('Y-m-d-h-i-s') . '.pdf';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);
        $pdf->save($relativePath);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }

    /**
     * download current account status report as excel
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadCurrentAccountStatusHistoryReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountStatusData' => app()->call([$this, 'fetchCurrentAccountStatusData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.current_account_status_report'),
            'displayLogo' => false
        ];

        $fileName = 'currentAccountStatusReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.AccountStatus.Views.Partials.currentAccountStatusHistory.exportView', $data);
            });
        })->store('xlsx', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.xlsx';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }

    /**
     * download current account status report as csv
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadCurrentAccountStatusHistoryReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountStatusData' => app()->call([$this, 'fetchCurrentAccountStatusData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.current_account_status_report'),
            'displayLogo' => false
        ];

        $fileName = 'currentAccountStatusReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.AccountStatus.Views.Partials.currentAccountStatusHistory.exportView', $data);
            });
        })->store('csv', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.' . $excel->ext;
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && \Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = \Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => \Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => \Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                \Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }


    /**
     * print current account status report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printCurrentAccountStatusHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'accountStatusData' => app()->call([$this, 'fetchCurrentAccountStatusData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AccountStatus.current_account_status_report'),
            'displayLogo' => true
        ];

        return view('General.AccountStatus.Views.Partials.currentAccountStatusHistory.exportView', $data);
    }
}

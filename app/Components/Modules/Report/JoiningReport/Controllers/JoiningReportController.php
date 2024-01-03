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

namespace App\Components\Modules\Report\JoiningReport\Controllers;

use App\Blueprint\Services\UserServices;
use App\Components\Modules\Report\JoiningReport\JoiningReportIndex as Module;
use App\Eloquents\Country;
use App\Eloquents\Package;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;


/**
 * Class JoiningReportController
 * @package App\Components\Modules\Report\JoiningReport\Controllers
 */
class JoiningReportController extends Controller
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
     * get index page of joining report
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
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

        $data['title'] = _mt($this->module->moduleId, 'JoiningReport.joining_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'JoiningReport.joining_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'JoiningReport.Report') => 'report.joining',
            _mt($this->module->moduleId, 'JoiningReport.joining_report') => 'report.joining'
        ];

        return view('Report.JoiningReport.Views.JoiningReportIndex', $data);
    }

    /**
     * load filters to the index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function filters()
    {
        $data = [
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => User::max('created_at'),
            ],
            'moduleId' => $this->module->moduleId,
            'package' => Package::get(),
            'countries' => Country::get()
        ];

        return view('Report.JoiningReport.Views.Partials.filter', $data);
    }

    /**
     * fetch the report table
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function fetch(Request $request)
    {

        $filters = $request->input('filters');
        $data['joiningData'] = app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 25)]);
        $data['moduleId'] = $this->module->moduleId;

        return view('Report.JoiningReport.Views.Partials.JoiningReportTable', $data);
    }

    /**
     * save the reportt as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return mixed
     */
    function downloadJoiningReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'joiningData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('Report.JoiningReport.Views.Partials.exportView', $data));
        $fileName = 'JoiningReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * save the report as Excel
     * @param Request $request
     * @return string
     */
    function downloadJoiningReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'joiningData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'JoiningReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.JoiningReport.Views.Partials.exportView', $data);
            });
        });
        $fileName .= '.xlsx';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);
        $excel->store('xlsx', storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR));

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
     * save the report as Excel
     * @param Request $request
     * @return string
     */
    function downloadJoiningReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'joiningData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => false
        ];

        $fileName = 'JoiningReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.JoiningReport.Views.Partials.exportView', $data);
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function printJoiningReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'joiningData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => true
        ];

        return view('Report.JoiningReport.Views.Partials.exportView', $data);
    }

    /**
     * @param Collection $filters
     * @param UserServices $userServices
     * @param int $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchUserData(Collection $filters, UserServices $userServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        $memberId = $filters->get('customer_id') ?? null;

        return $userServices->getUsers($filters, false, true)
            ->when(!$filters->get('user_id') && $memberId, function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->where('customer_id', $memberId);
            })
            ->when($email = $filters->get('email'), function ($query) use ($email) {
                /** @var Builder $query */
                $query->where('email', 'like', "%$email%");
            })
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('id', $userId);
            })->when($package_id = $filters->get('package'), function ($query) use ($package_id) {
                /** @var Builder $query */
                $query->where('package_id', $package_id);
            })->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })->whereHas('metaData', function ($query) use ($filters) {
                /** @var Builder $query */
                if ($firstname = $filters->get('firstname')) $query->where('firstname', 'like', "%$firstname%");
                if ($lastname = $filters->get('lastname')) $query->where('lastname', 'like', "%$lastname%");
                if ($country = isset($filters['country_ids'])?$filters['country_ids']:false) $query->whereIn('country_id',$country);
            })->{$method}($pages);
    }
}

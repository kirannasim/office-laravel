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

namespace App\Components\Modules\Report\SalesReport\Controllers;

use App\Blueprint\Query\Builder;
use App\Blueprint\Services\OrderServices;
use App\Components\Modules\Report\SalesReport\SalesReportIndex as Module;
use App\Eloquents\Order;
use App\Eloquents\Package;
use App\Http\Controllers\Controller;
use Aws\S3\Exception\S3Exception;
use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

/**
 * Class SalesReportController
 * @package App\Components\Modules\Report\SalesReport\Controllers
 */
class SalesReportController extends Controller
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
     * get index page of report
     *
     * @return Factory|View
     */
    function index()
    {
        $data = [];

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
                asset('global/css/report-style.css')
            ],
            'moduleId' => $this->module->moduleId
        ];

        $data['title'] = _mt($this->module->moduleId, 'SalesReport.sales_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'SalesReport.sales_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'SalesReport.Report') => 'report.sales',
            _mt($this->module->moduleId, 'SalesReport.sales_report') => 'report.sales'
        ];

        return view('Report.SalesReport.Views.salesReportIndex', $data);
    }

    /**
     * fetch filter view
     *
     * @return Factory|View
     */
    function filters()
    {
        $data = [
            'default_filter' => [
                'packages' => Package::get(),
                'startDate' => Order::min('created_at'),
                'endDate' => Order::max('created_at'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('Report.SalesReport.Views.Partials.filter', $data);
    }

    /**
     * fetch report table
     *
     * @param Request $request
     * @param OrderServices $orderServices
     * @return Factory|View
     */
    function fetch(Request $request, OrderServices $orderServices)
    {

        $filters = $request->input('filters');
        $data['salesData'] = app()->call([$this, 'fetchSalesData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]);
        $data['moduleId'] = $this->module->moduleId;

        return view('Report.SalesReport.Views.Partials.salesReportTable', $data);
    }

    /**
     * fetch sales data
     *
     * @param Collection $filters
     * @param OrderServices $orderServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchSalesData(Collection $filters, OrderServices $orderServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $orderServices->getOrders(collect([]))
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            })->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })->when($memberId = $filters->get('memberId'), function ($query) use ($memberId) {
                /** @var Builder $query */
                $query->whereHas('user', function ($query) use ($memberId) {
                    /** @var Builder $query */
                    $query->where('customer_id', $memberId);
                });
            })->whereHas('products', function ($query) use ($filters) {
                if ($package = $filters->get('package')) /** @var Builder $query */
                    $query->where('product_id', $package);
            })
            ->{$method}($pages);
    }

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadSalesReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'salesData' => app()->call([$this, 'fetchSalesData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'SalesReport.sales_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('Report.SalesReport.Views.Partials.exportView', $data));
        $fileName = 'SalesReport-' . date('Y-m-d-h-i-s') . '.pdf';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);
        $pdf->save($relativePath);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }


    /**
     * save the report as Excel
     *
     * @param Request $request
     * @return string
     */
    function downloadSalesReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'salesData' => app()->call([$this, 'fetchSalesData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'SalesReport.sales_report'),
            'displayLogo' => false
        ];

        $fileName = 'SalesReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.SalesReport.Views.Partials.exportView', $data);
            });
        })->store('xlsx', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.xlsx';
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }

    /**
     * save the report as csv
     *
     * @param Request $request
     * @return string
     */
    function downloadSalesReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'salesData' => app()->call([$this, 'fetchSalesData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'SalesReport.sales_report'),
            'displayLogo' => false
        ];

        $fileName = 'SalesReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.SalesReport.Views.Partials.exportView', $data);
            });
        })->store('csv', storage_path('app' . DIRECTORY_SEPARATOR . 'public'));


        $fileName .= '.' . $excel->ext;
        $relativePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $fileName);

        //Uploading to S3 if available:
        if (env('S3_KEY') && env('S3_TEMPORARY_DIR') && Storage::disk('public')->has($fileName)) {
            //STORING FILE ON S3:
            try {
                $s3_object = Storage::disk('s3')->getDriver()->getAdapter()->getClient()->putObject([
                    'Bucket' => env('S3_BUCKET'),
                    'Key' => env('S3_TEMPORARY_DIR') . $fileName,
                    'Body' => Storage::disk('public')->get($fileName),
                    'ACL' => 'public-read',
                    'ContentType' => Storage::disk('public')->mimeType($fileName) ?? 'text/plain',
                    'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+1 hours')),
                    'CacheControl' => 'max-age',
                ]);
            } catch (S3Exception $e) {
                return response()->json(['message' => 'Amazon S3 Exception!', 'errors' => [$e->getAwsErrorCode() => $e->getMessage()], 'status_code' => $e->getStatusCode()], $e->getStatusCode());
            }
            $s3_results = $s3_object->toArray();
            if (!empty($s3_results['ObjectURL'])) {
                Storage::disk('public')->delete($fileName);
                return response()->json(['link' => $s3_results['ObjectURL']]);
            }
        }

        return response()->json(['link' => asset("storage/{$fileName}")]);
    }

    /**
     * print report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printSalesReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'salesData' => app()->call([$this, 'fetchSalesData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'SalesReport.sales_report'),
            'displayLogo' => true
        ];

        return view('Report.SalesReport.Views.Partials.exportView', $data);
    }
}

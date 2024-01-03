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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\Controllers;

use App\Components\Modules\General\DefaultBinaryPositionSelector\DefaultBinaryPositionSelectorIndex as Module;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelectorHistory;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Aws\S3\Exception\S3Exception;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

/**
 * Class BinaryPositionSelectorController
 * @package App\Components\Modules\General\ChangeSponsor\Controllers
 */
class BinaryPositionSelectorController extends Controller
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
     * @throws Exception
     */
    function saveDefaultBinaryPosition(Request $request)
    {
        $validator = Validator::make($request->all(), ['user_id' => 'required']);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $userId = $request->input('user_id');
        $currentPosition = User::find($request->input('user_id'))->repoData()->first()->default_binary_position;
        $newPosition = $request->input('default_binary_position');

        if ($currentPosition != $newPosition) {
            DB::transaction(function () use ($currentPosition, $newPosition, $userId) {
                //update sponsor
                User::find($userId)->repoData()->update(['default_binary_position' => $newPosition]);
                //keep history
                BinaryPositionSelectorHistory::create([
                    'user_id' => $userId,
                    'from_selector' => $currentPosition,
                    'to_selector' => $newPosition
                ]);
            });
        } else {
            return response()->json(['default_binary_position' => _mt('General-DefaultBinaryPositionSelector', 'BinaryPositionSelector.please_change_position')], 422);
        }

    }

    /**
     * change sponsor report index
     *
     * @return Factory|View
     */
    function defaultBinaryPositionReportIndex()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/moment.min.js'),
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

        $data['title'] = _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'BinaryPositionSelector.Report') => 'defaultBinaryPositionReport',
            _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report') => 'defaultBinaryPositionReport'
        ];

        return view('General.DefaultBinaryPositionSelector.Views.binaryDefaultPositionReportIndex', $data);
    }

    /**
     * change sponsor history filters
     *
     * @param Request $request
     * @return Factory|View
     */
    function defaultBinaryPositionReportFilters(Request $request)
    {
        $data = [
            'default_filter' => [
                'startDate' => BinaryPositionSelectorHistory::min('created_at') ? BinaryPositionSelectorHistory::min('created_at') : Carbon::today(),
                'endDate' => BinaryPositionSelectorHistory::max('created_at') ? BinaryPositionSelectorHistory::max('created_at') : Carbon::today(),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('General.DefaultBinaryPositionSelector.Views.Partials.binaryDefaultPositionReportFilters', $data);
    }

    /**
     * fetch table for change sponsor history
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchDefaultBinaryPositionReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPositionData' => app()->call([$this, 'fetchBinaryPositionChangeData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.DefaultBinaryPositionSelector.Views.Partials.binaryDefaultPositionReportTable', $data);
    }

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadDefaultBinaryPositionReportPdf(Request $request, PDF $pdf)
    {
        $data = [
            'changedPositionData' => $this->fetchBinaryPositionChangeData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.DefaultBinaryPositionSelector.Views.Partials.exportView', $data));
        $fileName = 'defaultBinaryPositionReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * fetch binary position change data
     *
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchBinaryPositionChangeData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return BinaryPositionSelectorHistory::when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
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
        })->{$method}($pages);
    }

    /**
     * download report as excel
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadDefaultBinaryPositionReportExcel(Request $request)
    {
        $data = [
            'changedPositionData' => $this->fetchBinaryPositionChangeData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report'),
            'displayLogo' => false
        ];

        $fileName = 'defaultBinaryPositionReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.DefaultBinaryPositionSelector.Views.Partials.exportView', $data);
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
     * download report as csv
     *
     * @param Request $request
     * @return JsonResponse
     */
    function defaultBinaryPositionReportCsv(Request $request)
    {
        $data = [
            'changedPositionData' => $this->fetchBinaryPositionChangeData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report'),
            'displayLogo' => false
        ];

        $fileName = 'defaultBinaryPositionReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.DefaultBinaryPositionSelector.Views.Partials.exportView', $data);
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
    function printDefaultBinaryPositionReport(Request $request)
    {
        $data = [
            'changedPositionData' => $this->fetchBinaryPositionChangeData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'BinaryPositionSelector.binary_default_position_change_report'),
            'displayLogo' => true
        ];

        return view('General.DefaultBinaryPositionSelector.Views.Partials.exportView', $data);
    }

}

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

namespace App\Components\Modules\General\Payout\ModuleCore\Traits;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Trait DownloadReport
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait DownloadReport
{
    //payout request report download functions

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutRequestReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutRequestData' => app()->call([$this, 'fetchPayoutRequestData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'Payout.payout_request_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.Payout.Views.Partials.Report.exportView', $data));
        $fileName = 'PayoutRequestReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * download report as excel
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutRequestReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutRequestData' => app()->call([$this, 'fetchPayoutRequestData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => false
        ];

        $fileName = 'PayoutRequestReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.Payout.Views.Partials.Report.exportView', $data);
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
     * download report as csv
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutRequestReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutRequestData' => app()->call([$this, 'fetchPayoutRequestData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => false
        ];

        $fileName = 'PayoutRequestReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.Payout.Views.Partials.Report.exportView', $data);
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
     * print the report
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function printPayoutRequestReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutRequestData' => app()->call([$this, 'fetchPayoutRequestData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'JoiningReport.joining_report'),
            'displayLogo' => true
        ];
        return view('General.Payout.Views.Partials.Report.exportView', $data);
    }

    //payout released report download functions


    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutReleasedReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutReleasedData' => app()->call([$this, 'fetchPayoutReleasedData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'Payout.payout_released_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.Payout.Views.Partials.Report.exportViewReleasedReport', $data));
        $fileName = 'PayoutReleasedReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * download report as excel
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutReleasedReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutReleasedData' => app()->call([$this, 'fetchPayoutReleasedData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'Payout.payout_released_report'),
            'displayLogo' => false
        ];

        $fileName = 'PayoutReleasedReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.Payout.Views.Partials.Report.exportViewReleasedReport', $data);
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
     * download report as csv
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function downloadPayoutReleasedReportCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutReleasedData' => app()->call([$this, 'fetchPayoutReleasedData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'Payout.payout_released_report'),
            'displayLogo' => false
        ];

        $fileName = 'PayoutReleasedReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.Payout.Views.Partials.Report.exportViewReleasedReport', $data);
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
     * print released report
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function printPayoutReleasedReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'payoutReleasedData' => app()->call([$this, 'fetchPayoutReleasedData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'Payout.payout_released_report'),
            'displayLogo' => true
        ];

        return view('General.Payout.Views.Partials.Report.exportViewReleasedReport', $data);
    }


}

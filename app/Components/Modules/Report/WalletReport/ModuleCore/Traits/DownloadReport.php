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

namespace App\Components\Modules\Report\WalletReport\ModuleCore\Traits;

use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Trait DownloadReport
 * @package App\Components\Modules\Report\WalletReport\ModuleCore\Traits
 */
trait DownloadReport
{
    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadFundReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');

        $walletModule = getModule((int)$filters['wallet']);
        $data = [
            'fundData' => app()->call([$this, 'fetchUserFundData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => true,
            'walletSlug' => Str::camel($walletModule->registry['key'])
        ];

        $pdf->loadHTML(view('Report.WalletReport.Views.Partials.FundReport.exportView', $data));
        $fileName = 'FundReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
    function downloadFundReportExcel(Request $request)
    {
        $filters = $request->input('filters');

        $walletModule = getModule((int)$filters['wallet']);
        $data = [
            'fundData' => app()->call([$this, 'fetchUserFundData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
            'walletSlug' => Str::camel($walletModule->registry['key'])
        ];

        $fileName = 'FundReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.WalletReport.Views.Partials.FundReport.exportView', $data);
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
    function downloadFundReportCsv(Request $request)
    {
        $filters = $request->input('filters');

        $walletModule = getModule((int)$filters['wallet']);
        $data = [
            'fundData' => app()->call([$this, 'fetchUserFundData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
            'walletSlug' => Str::camel($walletModule->registry['key'])
        ];

        $fileName = 'FundReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.WalletReport.Views.Partials.FundReport.exportView', $data);
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
    function printFundReport(Request $request)
    {
        $filters = $request->input('filters');

        $walletModule = getModule((int)$filters['wallet']);
        $data = [
            'fundData' => app()->call([$this, 'fetchUserFundData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
            'walletSlug' => Str::camel($walletModule->registry['key'])
        ];

        return view('Report.WalletReport.Views.Partials.FundReport.exportView', $data);
    }

    // download fund transfer report

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadFundTransferReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');

        $data = [
            'fundTransferData' => app()->call([$this, 'fetchUserFundTransferData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_transfer_report'),
            'displayLogo' => true,
        ];

        $pdf->loadHTML(view('Report.WalletReport.Views.Partials.FundTransferReport.exportView', $data));
        $fileName = 'FundTransferReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
    function downloadFundTransferReportExcel(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'fundTransferData' => app()->call([$this, 'fetchUserFundTransferData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
        ];

        $fileName = 'FundTransferReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.WalletReport.Views.Partials.FundTransferReport.exportView', $data);
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
    function downloadFundTransferReportCsv(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'fundTransferData' => app()->call([$this, 'fetchUserFundTransferData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
        ];

        $fileName = 'FundTransferReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.WalletReport.Views.Partials.FundTransferReport.exportView', $data);
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
    function printFundTransferReport(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'fundTransferData' => app()->call([$this, 'fetchUserFundTransferData'], ['filters' => collect($filters)]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'WalletReport.fund_report'),
            'displayLogo' => false,
        ];

        return view('Report.WalletReport.Views.Partials.FundTransferReport.exportView', $data);
    }
}
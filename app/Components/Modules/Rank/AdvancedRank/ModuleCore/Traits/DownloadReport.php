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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits;

use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Trait DownloadReport
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits
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
    function downloadRankReportPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'rankData' => app()->call([$this, 'fetchRankReportData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('Rank.AdvancedRank.Views.Partials.rankReport.exportView', $data));
        $fileName = 'rankReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * @return JsonResponse
     */
    function downloadRankReportExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'rankData' => app()->call([$this, 'fetchRankReportData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'displayLogo' => false
        ];

        $fileName = 'rankReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Rank.AdvancedRank.Views.Partials.rankReport.exportView', $data);
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
     * @return JsonResponse
     */
    function downloadRankReportHistoryCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'rankData' => app()->call([$this, 'fetchRankReportData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'displayLogo' => false
        ];

        $fileName = 'rankReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Rank.AdvancedRank.Views.Partials.rankReport.exportView', $data);
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
     * print report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printRankReportHistory(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'rankData' => app()->call([$this, 'fetchRankReportData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_report'),
            'displayLogo' => true
        ];

        return view('Rank.AdvancedRank.Views.Partials.rankReport.exportView', $data);
    }

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadRankAchievementHistoryReportPdf(Request $request, PDF $pdf)
    {
        $data = [
            'rankAchievedData' => $this->fetchRankAchievementHistoryReportData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('Rank.AdvancedRank.Views.Partials.RankAchievementReport.exportView', $data));
        $fileName = 'rankAchievementReport-' . date('Y-m-d-h-i-s') . '.pdf';
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
     * @return JsonResponse
     */
    function downloadRankAchievementHistoryReportExcel(Request $request)
    {
        $data = [
            'rankAchievedData' => $this->fetchRankAchievementHistoryReportData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'displayLogo' => false
        ];

        $fileName = 'rankAchievementReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Rank.AdvancedRank.Views.Partials.RankAchievementReport.exportView', $data);
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
     * @return JsonResponse
     */
    function downloadRankAchievementHistoryReportCsv(Request $request)
    {
        $data = [
            'rankAchievedData' => $this->fetchRankAchievementHistoryReportData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'displayLogo' => false
        ];

        $fileName = 'rankAchievementReport-' . date('Y-m-d-h-i-s');
        $excel = Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Rank.AdvancedRank.Views.Partials.RankAchievementReport.exportView', $data);
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
     * print report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printRankAchievementHistoryReport(Request $request)
    {
        $data = [
            'rankAchievedData' => $this->fetchRankAchievementHistoryReportData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'AdvancedRank.rank_achievement_report'),
            'displayLogo' => true
        ];

        return view('Rank.AdvancedRank.Views.Partials.RankAchievementReport.exportView', $data);
    }


}

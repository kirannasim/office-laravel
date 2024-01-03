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

namespace App\Components\Modules\General\ChangeSponsor\Controllers;

use App\Components\Modules\General\ChangeSponsor\ChangeSponsorIndex as Module;
use App\Components\Modules\General\ChangeSponsor\ModuleCore\Eloquents\ChangeSponsorHistory;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
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

/**
 * Class ChangeSponsorController
 * @package App\Components\Modules\General\ChangeSponsor\Controllers
 */
class ChangeSponsorController extends Controller
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
    function saveChangeSponsor(Request $request)
    {
        if (isDemoVersion()) return response()->json([], 403);

        $userId = $request->input('user_id');
        $currentSponsorId = User::find($request->input('user_id'))->sponsor()->id;
        $newSponsorId = User::where('username', $request->input('sponsor_name', 0))->first()->id;
        $validator = Validator::make($request->all(), ['sponsor_id' => 'required', 'sponsor_name' => 'required']);
        $validator->after(function ($validator) use ($currentSponsorId, $newSponsorId, $request, $userId) {
            if (UserRepo::exceptDownlines($userId, 'sponsor')->pluck('user_id')->search($newSponsorId) === false)
                $validator->errors()->add('sponsor_name', _mt($this->module->moduleId, 'ChangeSponsor.you_cant_able_to_set_sponsor_from_downline'));
            if ($currentSponsorId == $newSponsorId)
                $validator->errors()->add('sponsor_name', _mt($this->module->moduleId, 'ChangeSponsor.please_check_the_sponsor_username_you_entered'));
        });

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        DB::transaction(function () use ($currentSponsorId, $userId, $newSponsorId) {
            //update tree
            UserRepo::find($userId)->setSponsorIdAttribute($newSponsorId);
            //update sponsor
            User::find($userId)->repoData()->update(['sponsor_id' => $newSponsorId]);
            //keep history
            ChangeSponsorHistory::create([
                'user_id' => $userId,
                'from_sponsor' => $currentSponsorId,
                'to_sponsor' => $newSponsorId
            ]);
        });
    }

    /**
     * change sponsor report index
     *
     * @return Factory|View
     */
    function changeSponsorHistoryReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'heading_text' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'ChangeSponsor.Report') => 'changeSponsorReport',
                _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report') => 'changeSponsorReport'
            ],
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

        return view('General.ChangeSponsor.Views.changeSponsorReportIndex', $data);
    }

    /**
     * change sponsor history filters
     *
     * @param Request $request
     * @return Factory|View
     */
    function changeSponsorHistoryFilters(Request $request)
    {
        $data = [
            'default_filter' => [
                'startDate' => ChangeSponsorHistory::min('created_at') ? ChangeSponsorHistory::min('created_at') : Carbon::today(),
                'endDate' => ChangeSponsorHistory::max('created_at') ? ChangeSponsorHistory::max('created_at') : Carbon::today(),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('General.ChangeSponsor.Views.Partials.changeSponsorReportFilters', $data);
    }

    /**
     * fetch table for change sponsor history
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchChangeSponsorHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedSponsorData' => app()->call([$this, 'fetchChangeSponsorData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.ChangeSponsor.Views.Partials.changeSponsorReportTable', $data);
    }

    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadChangeSponsorHistoryPdf(Request $request, PDF $pdf)
    {
        $data = [
            'changedSponsorData' => $this->fetchChangeSponsorData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.ChangeSponsor.Views.Partials.exportView', $data));
        $fileName = 'changeSponsorReport-' . date('Y-m-d-h-i-s') . '.pdf';
        $pdf->save(public_path($relativePath = 'downloads' . DIRECTORY_SEPARATOR . $fileName));

        return response()->json(['link' => asset($relativePath)]);
    }

    /**
     * fetch change sponsor data
     *
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchChangeSponsorData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return ChangeSponsorHistory::when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->when($filters->get('date'), function ($query) use ($filters) {
            $dates = explode(' - ', $filters->get('date'));
            if (isset($dates[0]))
                $query->whereDate('created_at', '>=', $dates[0]);
            if (isset($dates[1]))
                $query->whereDate('created_at', '<=', $dates[1]);
        })->{$method}($pages);
    }

    /**
     * download report as excel
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadChangeSponsorHistoryExcel(Request $request)
    {
        $data = [
            'changedSponsorData' => $this->fetchChangeSponsorData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'changeSponsorReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.ChangeSponsor.Views.Partials.exportView', $data);
            });
        })->store('xls', public_path($relativePath = 'downloads'));

        return response()->json(['link' => asset($relativePath) . '/' . $fileName . '.' . $excel->ext]);

    }

    /**
     * download report as csv
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadChangeSponsorHistoryCsv(Request $request)
    {
        $data = [
            'changedSponsorData' => $this->fetchChangeSponsorData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'changeSponsorReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.ChangeSponsor.Views.Partials.exportView', $data);
            });
        })->store('csv', public_path($relativePath = 'downloads'));

        return response()->json(['link' => asset($relativePath) . '/' . $fileName . '.' . $excel->ext]);

    }

    /**
     * print report
     *
     * @param Request $request
     * @return Factory|View
     */
    function printChangeSponsorHistory(Request $request)
    {
        $data = [
            'changedSponsorData' => $this->fetchChangeSponsorData(collect($request->input('filters'))),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangeSponsor.change_sponsor_report'),
            'displayLogo' => true
        ];

        return view('General.ChangeSponsor.Views.Partials.exportView', $data);
    }

}

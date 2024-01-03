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

namespace App\Components\Modules\General\ChangePlacement\Controllers;

use App\Blueprint\Query\Builder;
use App\Components\Modules\General\ChangePlacement\ChangePlacementIndex as Module;
use App\Components\Modules\General\ChangePlacement\ModuleCore\Eloquents\ChangePlacementHistory;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ChangePlacementController
 * @package App\Components\Modules\General\ChangePlacement\Controllers
 */
class ChangePlacementController extends Controller
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
    function saveChangePlacement(Request $request)
    {
        $node = new UserRepo();
        $currentUser  = $node->where([ 'user_id' => $request->input('user_id') ])->first();
        $NewPostion    = 3 - $currentUser->position;
        $CurentPosition = $currentUser->position;
        $currentUserID = $currentUser->user_id;
        $currentParentID = $currentUser->parent_id;
        $NewParentID = null;
        $OldParent = null;
        $OldChild = null;


        $NewParent = UserRepo::where(['sponsor_id'=>$currentUser->sponsor_id,'position'=>$NewPostion])->orderBy('user_level', 'desc')->first();

        $OldParent = $node->where('user_id','=',$currentParentID)->first();
        $OldChild  = $node->where([ 'parent_id' => $currentUserID ])->first();

        if($OldChild){
            $OldParent->appendNode($OldChild);
        }

        if (!$NewParent) {
            UserRepo::where('user_id','=', $currentUserID)->update(['position'=> $NewPostion]);
            $OldParent = $node->where('user_id','=',$currentParentID)->first();
            $OldParent->appendNode($currentUser);
            $NewParentID = $currentUser->parent_id;
        }else {
            $node->where([ 'user_id' => $currentUserID ])->update(['position'=>$NewPostion, 'user_level'=>$NewParent->user_level+1]);
            $NewParent->appendNode($currentUser);
            $NewParentID = $NewParent->user_id;
        }



        $node->where(['user_id'=>'14'])->first()->refreshNode();


        if (isDemoVersion()) return response()->json([], 403);


        DB::transaction(function () use ($NewPostion, $CurentPosition, $currentParentID, $NewParentID, $currentUserID) {
            $prepend = $NewPostion == 1 ? true : false;
            UserRepo::setPrepend($prepend);
            User::find($currentUserID)->repoData()->update(['position' => $NewPostion]);
            ChangePlacementHistory::create([
                'user_id' => $currentUserID,
                'from_parent' => $currentParentID,
                'from_position' => $CurentPosition,
                'to_parent' => $NewParentID,
                'to_position' => $NewPostion,
            ]);
        });

        return response()->json(['new_position'=>$NewPostion], 200);
    }

    /**
     * change placement report index
     *
     * @return Factory|View
     */
    function changePlacementHistoryReportIndex()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'heading_text' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'ChangePlacement.Report') => 'changePlacementReport',
                _mt($this->module->moduleId, 'ChangePlacement.change_placement_report') => 'changePlacementReport'
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

        return view('General.ChangePlacement.Views.changePlacementReportIndex', $data);
    }

    /**
     * change placement history filters
     *
     * @return Factory|View
     */
    function changePlacementHistoryFilters()
    {
        $data = [
            'default_filter' => [
                'startDate' => ChangePlacementHistory::min('created_at') ? ChangePlacementHistory::min('created_at') : Carbon::today(),
                'endDate' => ChangePlacementHistory::max('created_at') ? ChangePlacementHistory::max('created_at') : Carbon::today(),
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('General.ChangePlacement.Views.Partials.changePlacementReportFilters', $data);
    }

    /**
     * fetch table for change placement history
     *
     * @param Request $request
     * @return Factory|View
     */
    function fetchChangePlacementHistoryReport(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPlacementData' => app()->call([$this, 'fetchChangePlacementData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.ChangePlacement.Views.Partials.changePlacementReportTable', $data);
    }

    /**
     * fetch change placement data
     *
     * @param Collection $filters
     * @return mixed
     */
    function fetchChangePlacementData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return ChangePlacementHistory::with(['user', 'fromParent', 'toParent'])
        ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('user_id', $userId);
        })->when($sponsor_id = $filters->get('sponsor_id'), function ($query) use ($sponsor_id) {
                /** @var Builder $query */
                $query->whereHas('user.repoData',function ($query) use ($sponsor_id){
                    $query->where('sponsor_id','=',$sponsor_id);
                });
        })->when($filters->get('date'), function ($query) use ($filters) {
            $dates = explode(' - ', $filters->get('date'));
            if (isset($dates[0]))
                $query->whereDate('created_at', '>=', $dates[0]);
            if (isset($dates[1]))
                $query->whereDate('created_at', '<=', $dates[1]);
        })->{$method}($pages);
    }


    /**
     * download report as pdf
     *
     * @param Request $request
     * @param PDF $pdf
     * @return JsonResponse
     */
    function downloadChangePlacementHistoryPdf(Request $request, PDF $pdf)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPlacementData' => app()->call([$this, 'fetchChangePlacementData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'displayLogo' => true
        ];

        $pdf->loadHTML(view('General.ChangePlacement.Views.Partials.exportView', $data));
        $fileName = 'changePlacementReport-' . date('Y-m-d-h-i-s') . '.pdf';
        $pdf->save(public_path($relativePath = 'downloads' . DIRECTORY_SEPARATOR . $fileName));

        return response()->json(['link' => asset($relativePath)]);
    }

    /**
     * download report as excel
     *
     * @param Request $request
     * @return JsonResponse
     */
    function downloadChangePlacementHistoryExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPlacementData' => app()->call([$this, 'fetchChangePlacementData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'changePlacementReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.ChangePlacement.Views.Partials.exportView', $data);
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
    function downloadChangePlacementHistoryCsv(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPlacementData' => app()->call([$this, 'fetchChangePlacementData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'changePlacementReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('General.ChangePlacement.Views.Partials.exportView', $data);
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
    function printChangePlacementHistory(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'changedPlacementData' => app()->call([$this, 'fetchChangePlacementData'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'ChangePlacement.change_placement_report'),
            'displayLogo' => true
        ];

        return view('General.ChangePlacement.Views.Partials.exportView', $data);
    }
}

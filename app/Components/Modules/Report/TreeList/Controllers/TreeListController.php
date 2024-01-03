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

namespace App\Components\Modules\Report\TreeList\Controllers;

use App\Blueprint\Query\Builder;
use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Report\TreeList\TreeListIndex as Module;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank;
use App\Eloquents\Country;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class TreeListController
 * @package App\Components\Modules\Report\TreeList\Controllers
 */
class TreeListController extends Controller
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
     * @param ModuleServices $moduleServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(ModuleServices $moduleServices)
    {
        $data = [];
        $data['scripts'] = [
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/scripts/datatable.js'),
            asset('global/plugins/datatables/datatables.min.js'),
            asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
        ];
        $data['styles'] = [
            asset('global/plugins/datatables/datatables.min.css'),
            asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
            asset('global/css/report-style.css'),
            $this->module->getCssPath('style.css'),
        ];

        $data['title'] = _mt($this->module->moduleId, 'TreeList.tree_list');
        $data['heading_text'] = _mt($this->module->moduleId, 'TreeList.tree_list');
        $scope = session('theScope') ?: 'user';
        $data['breadcrumbs'] = [
            _t('index.home') => "$scope.home",
            _mt($this->module->moduleId, 'TreeList.Report') => 'treelist.table',
            _mt($this->module->moduleId, 'TreeList.tree_list') => 'treelist.table'
        ];

        $data['TreeListData'] = [];
        $data['moduleId'] = $this->module->moduleId;

        return view('Report.TreeList.Views.treeListIndex', $data);
    }

    /**
     * get filter view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getTreeListFilters()
    {
        $data['moduleId'] = $this->module->moduleId;
        $data['ranks'] = AdvancedRank::get()->pluck('id','name');
        $data['countries'] = Country::all();
        return view('Report.TreeList.Views.Partials.treeListFilters', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getDownlines(Request $request)
    {
        $pages = $request->input('totalToShow', 10);
        $filters = $request->input('filters');
        $data['moduleId'] = $this->module->moduleId;

        $data['downlines'] = UserRepo::with('user.metaData', 'rank.rank')
            ->when($user_id = $filters['user_id'] , function ($query) use ($user_id){
                $query->where('user_id','=', $user_id);
            })->when($memberId = $filters['memberId'], function ($query) use ($memberId) {
                $query->whereHas('user', function ($query) use ($memberId) {
                    /** @var Builder $query */
                    $query->where('customer_id', $memberId);
                });
            })->when($rank = $filters['type'], function ($query) use ($rank){
                $query->whereHas('rank.rank',function ($query) use ($rank){
                    $query->where('id',$rank);
                });
            })
            ->when($country_id = isset($filters['country_ids'])?$filters['country_ids']:false, function ($query) use ($country_id){
                $query->whereHas('user.metaData.country',function ($query) use ($country_id){
                    $query->whereIn('id',$country_id);
                });
            })->paginate($pages);

        return view('Report.TreeList.Views.Partials.treeListTable', $data);
    }
}

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

namespace App\Components\Modules\Tree\TabularTree\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Components\Modules\Tree\TabularTree\TabularTreeIndex as Module;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Throwable;

/**
 * Class TabularTreeController
 * @package App\Components\Modules\Tree\TabularTree\Controllers
 */
class TabularTreeController extends Controller
{
    /**
     * @var $module ModuleBasicAbstract
     */
    public $module;

    /**
     * PayoutController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app(Module::class);
        $this->activePlan = getModule((int)getConfig('plan_configuration', 'default_plan'));
    }

    /**
     * @param $type
     * @param null $userId
     * @param Request $request
     * @return Factory|\Illuminate\Contracts\View\View|View|string
     */
    function index($type, $userId = null, Request $request)
    {
        if (!$this->activePlan)
            dd('You cant able to access this page, Because no mlm plan found');

        $data = [
            'scripts' => [
                $this->module->getJsPath() . 'jstree.js'
            ],
            'styles' => [
                $this->module->getCssPath() . 'themes/default/style.css',
                $this->module->getCssPath() . 'style.css',
            ],
            'title' => _mt($this->module->moduleId, 'TabularTree.tabular_tree'),
            'heading_text' => _mt($this->module->moduleId, 'TabularTree.tabular_tree'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'TabularTree.Tree') => "admin.tree.tabularTree",
                _mt($this->module->moduleId, 'TabularTree.tabular_tree') => "admin.tree.tabularTree",
            ]
        ];

        $userId = !$userId ? loggedId() : $userId;
        $option['level'] = 2;
        $option['type'] = $data['type'] = $type;
        $option['parent'] = $userId;
        $data['ajaxRequest'] = $request->ajax() ? true : false;
        $data['user'] = loggedId();
        $data['type'] = $option['type'];
        $data['moduleId'] = $this->module->moduleId;
        $data['moduleData'] = $this->module->getModuleData(true);

        return view('Tree.TabularTree.Views.tabularTree', $data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function loadTreeNode(Request $request)
    {
        $parent = $request->input('parent');
        $data = array();

        $dispatch = [];
        $dispatch['parentId'] = ($parent == "#" || !isset($parent)) ? loggedId() : $parent;
        $dispatch['type'] = $request->input('type');
        $downLines = $this->getData(collect($dispatch));

        foreach ($downLines as $key => $value) {
            if ($dispatch['type'] == 'placement')
                $children = ($value->repoData->RHS - $value->repoData->LHS) == 1 ? false : true;
            elseif ($dispatch['type'] == 'sponsor')
                $children = ($value->repoData->SRHS - $value->repoData->SLHS) == 1 ? false : true;

            $data[] = array(
                "id" => $value->id,
                "text" => $value->username,
                "icon" => "fa fa-user icon-lg icon-state-info",
                //"icon" => "fa fa-user icon-lg icon-state-" . ($states[rand(0, 3)]),
                "children" => $children,
                "type" => "root"
            );
        }

        return response()->json($data, 200);
    }

    /**
     * Get Data from tree module
     *
     * @param Collection $options tree rendering options
     * @return string
     */
    function getData(Collection $options)
    {
        /** @var UserRepo $parent */
        $downlines = User::with(['repoData', 'metaData'])->whereHas('repoData', function ($query) use ($options) {
            if ($options['type'] == 'placement')
                $query->where('parent_id', $options->get('parentId'));
            elseif ($options['type'] == 'sponsor')
                $query->where('sponsor_id', $options->get('parentId'));
        })->get();

        return $downlines;
    }

    /**
     * @param null $id
     * @return string
     * @throws Throwable
     */
    function tooltip($id = null)
    {
        $data = [
            'profile' => User::with(['metaData', 'repoData'])->find($id),
            'moduleId' => $this->module->moduleId,
            'moduleData' => $this->module->getModuleData(true),
        ];

        return view('Tree.TabularTree.Views.tooltip', $data)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function getParentTreeNodes(Request $request)
    {
        return (new UserRepo)->ancestorsOfQuery($request->input('userId'), $request->input('type'))
            ->where('user_id', '>', $request->input('parentId'))
            ->pluck('user_id');
    }

}

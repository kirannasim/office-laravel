<?php

namespace App\Components\Modules\General\DownLineList\Controllers;

use App\Components\Modules\General\DownLineList\DownLineListIndex as Module;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/*
 * DownLineListControllers
 */

class DownLineListControllers extends Controller
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
     * @return Factory|View
     */
    function filters(Request $request)
    {
        $data = [
            'depth' => 7,
            'userId' => $request->input('userId'),
            'moduleId' => $this->module->moduleId,
        ];

        return view('General.DownLineList.Views.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function fetch(Request $request)
    {
        $filters = $request->input('filters');
        $user = User::find($filters['user_id']);
        $pages = $request->input('totalToShow', 20);
        $data = [
            'moduleId' => $this->module->moduleId,
            'downlines' => $user->repoData->descendantsQuery('placement', true)
                ->where('user_level', $user->repoData->user_level + $filters['level'])->paginate($pages)
        ];

        return view('General.DownLineList.Views.downlineList', $data);
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    function getDownlines(Request $request)
    {
        $data = [
            'userId' => $request->input('user')
        ];

        return view('General.DownLineList.Views.index', $data);
    }
}
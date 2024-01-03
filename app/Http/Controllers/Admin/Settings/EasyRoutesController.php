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

namespace App\Http\Controllers\Admin\Settings;

use App\Blueprint\Services\EasyRouteServices;
use App\Eloquents\EasyRoute;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


/**
 * Class EasyRoutes
 * @package App\Http\Controllers\Admin\Settings
 */
class EasyRoutesController extends Controller
{
    /**
     * @param EasyRouteServices $routeServices
     * @return Factory|View
     */
    function index(EasyRouteServices $routeServices)
    {
        $data = [
            'routes' => $routeServices->nonEasyRoutes(),
            'easyRoutes' => EasyRoute::all(),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('index.home', 'JoiningReport.joining_report') => 'report.joining'
            ]
        ];

        return view('Admin.Settings.easyRoutes', $data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function action(Request $request)
    {
        if (!$action = $request->input('action'))
            return response()->json(['status' => false], 422);

        return app()->call([$this, $action], [$request->input('params', [])]);
    }

    /**
     * Add Route
     *
     * @param Request $request
     * @return JsonResponse
     * @internal param array $routes routes to be added
     */
    function addRoute(Request $request)
    {
        foreach ($request->input('routes') as $key => $value) {
            if (EasyRoute::where('route_name', $value['route_name'])->exists()) continue;
            EasyRoute::create($value);
        }

        return response()->json(['status' => true]);
    }

    /**
     * Update Route
     *
     * @param Request $request
     * @return JsonResponse
     */
    function updateRoute(Request $request)
    {
        EasyRoute::find($request->input('id'))
            ->update($request->only(['id', 'title', 'description']));

        return response()->json(['status' => true]);
    }

    /**
     * Delete Route
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    function deleteRoute(Request $request)
    {
        EasyRoute::whereIn('id', $request->input('routes'))->delete();

        return response()->json(['status' => true]);
    }

    /**
     * @param EasyRouteServices $routeServices
     * @return JsonResponse
     */
    function addAll(EasyRouteServices $routeServices)
    {
        $routeServices->nonEasyToEasyRoutes();

        return response()->json(['status' => true]);
    }

    /**
     * @return JsonResponse
     */
    function revertAll()
    {
        EasyRoute::truncate();

        return response()->json(['status' => true]);
    }
}
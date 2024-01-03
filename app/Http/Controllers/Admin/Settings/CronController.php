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

use App\Blueprint\Services\CronServices;
use App\Eloquents\CronHistory;
use App\Eloquents\CronJob;
use App\Eloquents\EasyRoute;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class CronController
 * @package App\Http\Controllers\Admin\Settings
 */
class CronController extends Controller
{
    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'title' => _t('settings.cron_jobs'),
            'heading_text' => _t('settings.cron_jobs'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('settings.Settings') => 'cron',
                _t('settings.cron_jobs') => 'cron'
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('css/admin/pages/cron.css'),
            ],
        ];

        return view('Admin.Settings.cron', $data);
    }


    /**
     * @param CronServices $cronServices
     * @return Factory|View
     */
    function cronJobs(CronServices $cronServices)
    {
        $data['cronJobs'] = $cronServices->getCronJobs(collect([]));

        return view('Admin.Settings.Partials.Cron.cronJobs', $data);
    }

    /**
     * @param CronServices $cronServices
     * @return Factory|View
     */
    function form(CronServices $cronServices)
    {
        $data = [
            'cronJobs' => $cronServices->getRegisteredJobs(),
            'routes' => EasyRoute::get()
        ];

        return view('Admin.Settings.Partials.Cron.form', $data);
    }

    /**
     * @param Request $request
     * @param CronServices $cronServices
     * @return bool
     * @throws UrlGenerationException
     */
    function saveForm(Request $request, CronServices $cronServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $validator = Validator::make($request->all(), [
            'minute' => 'required',
            'hour' => 'required',
            'day' => 'required',
            'month' => 'required',
            'weekday' => 'required',
            /* 'task' => 'required_without_all:route,url',
             'route' => 'required_without_all:task,url',
             'url' => 'required_without_all:task,route',*/
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($request->input('id'))
            return $cronServices->updateCron($request);
        else
            return $cronServices->addCron($request);
    }

    /**
     * get individual news data
     *
     * @param Request $request
     * @param CronServices $cronServices
     * @return mixed json
     */
    function getCronJob(Request $request, CronServices $cronServices)
    {
        return json_encode($cronServices->getCronJob($request->input('id')));
    }

    /**
     * @param Request $request
     * @param CronServices $cronServices
     * @return string
     * @throws Exception
     */
    function deleteCronJob(Request $request, CronServices $cronServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        return json_encode($cronServices->deleteCronJob($request->input('id')));
    }

    function info()
    {
        //INSERT INTO `config` (`id`, `meta_key`, `meta_value`, `group`, `status`, `serialized`, `created_at`, `updated_at`) VALUES (NULL, 'email', 'info@company.com', 'cron', '1', '0', NULL, NULL);
        $data['email'] = getConfig('cron', 'email');

        return view('Admin.Settings.Partials.Cron.info', $data);
    }

    /**
     * @param Request $request
     * @param CronServices $cronServices
     * @return mixed
     */
    function updateCronEmail(Request $request, CronServices $cronServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        return $cronServices->updateCronEmail($request->input('email'));
    }

    /**
     * @param CronJob $cronJob
     * @param null $response
     * @return CronHistory|Model
     */
    function addCronHistory(CronJob $cronJob, $response = null)
    {
        return CronHistory::create([
            'cron_id' => $cronJob->id,
            'response' => $response,
        ]);
    }
}

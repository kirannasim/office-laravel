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

namespace App\Components\Modules\General\EmailBroadcasting\Controllers;

use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\EmailBroadcasting\EmailBroadcastingIndex as Module;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use App\Mail\MailTemplate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Class EmailBroadcastingController
 * @package App\Components\Modules\General\EmailBroadcasting\Controllers
 */
class EmailBroadcastingController extends Controller
{
    /**
     * EmailBroadcastingController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/plugins/summernote/summernote.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/css/report-style.css'),
                asset('global/plugins/summernote/summernote.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId,
            'title' => _mt($this->module->moduleId, 'EmailBroadCasting.email_broadcasting'),
            'heading_text' => _mt($this->module->moduleId, 'EmailBroadCasting.email_broadcasting'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'EmailBroadCasting.email_broadcasting') => getScope() . '.email.broadcast.index',
            ],
        ];

        return view('General.EmailBroadcasting.Views.userTableIndex', $data);
    }

    /**
     * @return Factory|View
     */
    function filters()
    {
        $data = [
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => User::max('created_at')
            ],
            'moduleId' => $this->module->moduleId,
        ];

        return view('General.EmailBroadcasting.Views.Partials.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function fetch(Request $request)
    {
        $filters = $request->input('filters');

        $data = [
            'userData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 5)]),
            'moduleId' => $this->module->moduleId
        ];

        return view('General.EmailBroadcasting.Views.Partials.usersTable', $data);
    }

    /**
     * @param Collection $filters
     * @param UserServices $userServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchUserData(Collection $filters, UserServices $userServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $userServices->getUsers($filters, null, true)
            ->when($email = $filters->get('email'), function ($query) use ($email) {
                /** @var Builder $query */
                $query->where('email', 'like', "%$email%");
            })
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('id', $userId);
            })
            ->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })
            ->whereHas('metaData', function ($query) use ($filters) {
                /** @var Builder $query */
                if ($firstname = $filters->get('firstname')) $query->where('firstname', 'like', "%$firstname%");
                if ($lastname = $filters->get('lastname')) $query->where('lastname', 'like', "%$lastname%");
            })->{$method}($pages);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    function sendBroadcastEmail(Request $request)
    {
        if ($request->input('selectAllUser') == 'true') {
            /** @var UserServices $userServices */
            $userServices = app(UserServices::class);
            $reciepientList = $userServices->getUsers(collect([]))->pluck('id')->toArray();
            $reciepient = User::find($reciepientList);
        } else
            $reciepient = User::find($request->input('users'));

        $moduleData = getModule('General-EmailBroadcasting')->getModuleData(true);

        $config = array(
            'driver' => $moduleData->get('mailserver'),
            'host' => $moduleData->get('smtp_host'),
            'port' => $moduleData->get('smtp_port'),
            'from' => array('address' => $moduleData->get('smtp_username'), 'name' => $moduleData->get('smtp_username')),
            'encryption' => $moduleData->get('smtp_protocol'),
            'username' => $moduleData->get('smtp_username'),
            'password' => $moduleData->get('smto_password')
        );

        $data = [
            'emailContent' => html_entity_decode($request->input('mailcontent'))
        ];

        $mailData = collect(
            [
                'recipient' => $reciepient,
                'mailBody' => view('General.EmailBroadcasting.Views.Partials.CommonMail', $data),
                'attachment' => null,
                'subject' => $request->input('subject'),
            ]
        );

        Config::set('mail', $config);

        Mail::to($reciepient)->send(new mailTemplate($mailData));
    }
}
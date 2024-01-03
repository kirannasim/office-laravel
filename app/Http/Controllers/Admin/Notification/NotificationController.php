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

namespace App\Http\Controllers\Admin\Notification;

use App\Blueprint\Query\Builder;
use App\Blueprint\Services\NotificationServices;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class NotificationController
 * @package App\Http\Controllers\User\Notification
 */
class NotificationController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'scripts' => [],
            'styles' => [],
            'title' => _t('notification.notification'),
            'heading_text' => _t('notification.notification'),
            'breadcrumbs' => [
                _t('notification.home') => 'admin.home',
                _t('notification.notification') => 'admin.home'
            ],
        ];

        return view('Admin.Notification.index', $data);
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    function getNotificationList(Request $request)
    {
        $filters = [];
        if (getScope() != 'admin') $filters['user_id'] = loggedId();
        $data['notifications'] = app()->call([$this, 'fetchNotificationList'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]);

        return view('Admin.Notification.Partials.notificationList', $data);
    }


    /**
     * @param Collection $filters
     * @param NotificationServices $notificationServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    function fetchNotificationList(Collection $filters, NotificationServices $notificationServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $notificationServices->getNotifications(collect([]))->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
            /** @var Builder $query */
            $query->where('notifiable_id', $userId);
        })->when($activity = $filters->get('notification_id'), function ($query) use ($activity) {
            /** @var Builder $query */
            $query->where('id', $activity);
        })->when($filters->get('date'), function ($query) use ($filters) {
            /** @var Builder $query */
            $dates = explode(' - ', $filters->get('date'));
            $query->whereDate('created_at', '>=', $dates[0]);
            $query->whereDate('created_at', '<=', $dates[1]);
        })->{$method}($pages);
    }


    /**
     * @param Request $request
     */
    public function markAsRead(Request $request)
    {
        foreach ($request->input('markIds') as $id) {
//            Notification::find($id)->update(['read_at'=>Carbon::now()]);
        }

    }

    /**
     * @return Factory|View
     */
    public function sendNotificationIndex()
    {
        $data = [
            'title' => _t('notification.send_notification'),
            'heading_text' => _t('notification.send_notification'),
            'breadcrumbs' => [
                _t('notification.home') => 'admin.home',
                _t('notification.send_notification') => 'admin.notification.send'
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'styles' => [],
        ];

        return view('Admin.Notification.sendIndex', $data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sendNotification(Request $request)
    {
        $rules = [
            'users' => 'required_without:selectAll',
            'message' => 'required',
            'subject' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);


        if ($request->input('selectAll'))
            $users = User::pluck('id')->toArray();
        else
            $users = $request->input('users');

        $data = [
            'subject' => $request->input('subject'),
            'body' => $request->input('message'),
            'link' => "#",
            'color' => '#dd0a0a',
            'icon' => 'fa fa-user',
            'time' => Carbon::now()
        ];

        foreach ($users as $user)
            systemNotify($data, User::find($user));
    }
}

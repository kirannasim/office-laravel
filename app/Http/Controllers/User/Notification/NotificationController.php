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

namespace App\Http\Controllers\User\Notification;

use App\Blueprint\Services\NotificationServices;
use App\Eloquents\Notification;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class NotificationController
 * @package App\Http\Controllers\User\Notification
 */
class NotificationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        loggedUser()->unreadNotifications->markAsRead();

        $data['title'] = _t('notification.notification');
        $data['heading_text'] = _t('notification.notification');
        $data['breadcrumbs'] = [_t('notification.home') => 'admin.home', _t('notification.notification') => 'admin.home'];
        $data['scripts'] = [];
        $data['styles'] = [];

        return view('User.Notification.index', $data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getNotificationList(Request $request)
    {
        if (getScope() != 'admin') $filters['user_id'] = loggedId();
        $data['notifications'] = app()->call([$this, 'fetchNotificationList'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]);

        return view('User.Notification.Partials.notificationList', $data);
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
    public function delete(Request $request)
    {
        foreach ($request->input('markIds') as $id) {
            Notification::find($id)->delete();
        }

    }

}

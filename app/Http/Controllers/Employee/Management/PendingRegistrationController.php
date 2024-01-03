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

namespace App\Http\Controllers\Employee\Management;

use App\Blueprint\Services\UserServices;
use App\Eloquents\TemporaryData;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\CartController;

/**
 * Class MemberController
 * @package App\Http\Controllers\Employee\Management
 */
class PendingRegistrationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        $scripts = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
        ];
        $styles = [
            asset('css/employee/pages/pendingRegistration.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
        ];
        $data['scripts'] = $scripts;
        $data['styles'] = $styles;
        $data['title'] = _t('pendingRegistration.pendingRegistration');
        $data['heading_text'] = _t('pendingRegistration.pendingRegistration');
        $data['breadcrumbs'] = [
            _t('index.home') => 'employee.home',
            _t('pendingRegistration.pendingRegistration') => 'management.pendingRegistration'
        ];
        $data['key'] = TemporaryData::where('context', 'registration')
            ->groupBy('key')->get()->pluck('key');

        return view('Employee.Management.PendingRegistration.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getList(Request $request)
    {
        $data = [];
        $pages = $request->input('totalToShow', 15);
        $filters = collect($request->input('filters'));

        $data['registrations'] = TemporaryData::where('context', 'registration')
            ->when($filters->get('key') != 'all', function ($query) use ($filters) {
                $query->where('key', $filters->get('key'));
            })
            ->when($filters->get('status') != 'all', function ($query) use ($filters) {
                $query->where('status', $filters->get('status'));
            })->orderBy('id', 'desc')->paginate($pages);

        return view('Employee.Management.PendingRegistration.list', $data);
    }

    /**
     * @param Request $request
     * @param CartController $cartController
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getDetails(Request $request, CartController $cartController)
    {
        $data = [];
        $data['details'] = TemporaryData::where('id', $request->input('id'))->first();
        $data['cartSummery'] = app()->call([$cartController, 'cartSummary'], [
            'isPackage' => ($data['details']->value['orderData']['orderType'] == 'package') ? true : false,
            'cartTotal' => $data['details']->value['cartDetails'],
        ]);
        return view('Employee.Management.PendingRegistration.details', $data);
    }

    /**
     * @param Request $request
     * @return bool|void
     */
    /**
     * @param Request $request
     * @param UserServices $userServices
     * @return bool|void
     */
    function activate(Request $request, UserServices $userServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $registrationData = TemporaryData::find($request->input('bankWireRegId'))->value;
        $activePlan = getModule((int)getConfig('plan_configuration', 'default_plan'));
        if ($activePlan->getRegistry()['key'] != 'Binary')
            $registrationData['orderData']['placement'] = $registrationData['orderData']['position'] = null;

        if (getConfig('registration', 'username_type') != 'static')
            $registrationData['orderData']['username'] = $userServices->randomUsername();

        if (User::where('username', $registrationData['orderData']['username'])->exists()) return;

        app()->call([getModule((int)$registrationData['orderData']['gateway'])->getCallback(), 'success'], ['response' => $registrationData]);

        TemporaryData::where('id', $request->input('bankWireRegId'))->update(['status' => 1]);
    }
}

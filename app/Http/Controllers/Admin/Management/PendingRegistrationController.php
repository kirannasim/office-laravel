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

namespace App\Http\Controllers\Admin\Management;

use App\Eloquents\TemporaryData;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\CartController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;


/**
 * Class MemberController
 * @package App\Http\Controllers\Admin\Management
 */
class PendingRegistrationController extends Controller
{
    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'styles' => [
                asset('css/admin/pages/pendingRegistration.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            ],
            'title' => _t('pendingRegistration.pendingRegistration'),
            'heading_text' => _t('pendingRegistration.pendingRegistration'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('pendingRegistration.pendingRegistration') => 'management.pendingRegistration'
            ],
            'key' => TemporaryData::where('context', 'registration')
                ->groupBy('key')->get()->pluck('key')
        ];

        return view('Admin.Management.PendingRegistration.index', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function getList(Request $request)
    {
        $filters = collect($request->input('filters'));

        $data['registrations'] = TemporaryData::where('context', 'registration')
            ->when($filters->get('key') != 'all', function ($query) use ($filters) {
                $query->where('key', $filters->get('key'));
            })
            ->when($filters->get('status') != 'all', function ($query) use ($filters) {
                $query->where('status', $filters->get('status'));
            })->orderBy('id', 'desc')->paginate($request->input('totalToShow', 10));

        return view('Admin.Management.PendingRegistration.list', $data);
    }

    /**
     * @param Request $request
     * @param CartController $cartController
     * @return Factory|View
     */
    function getDetails(Request $request, CartController $cartController)
    {
        $data = [];
        if ($request->input('id')) {
            $data['details'] = TemporaryData::where('id', $request->input('id'))->first();
            $data['cartSummery'] = app()->call([$cartController, 'cartSummary'], [
                'isPackage' => ($data['details']->value['orderData']['orderType'] == 'package') ? true : false,
                'cartTotal' => $data['details']->value['cartDetails'],
            ]);
        }

        return view('Admin.Management.PendingRegistration.details', $data);
    }

    /**
     * @param Request $request
     * @return bool|void
     */
    function activate(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $registrationData = TemporaryData::find($request->input('bankWireRegId'))->value;
        $registrationData['orderData']['placement'] = $registrationData['orderData']['position'] = null;

        if (User::where('username', $registrationData['orderData']['username'])->exists())
            return;

        app()->call([getModule((int)$registrationData['orderData']['gateway'])->getCallback(), 'success'], ['response' => $registrationData]);

        TemporaryData::where('id', $request->input('bankWireRegId'))->update(['status' => 1]);
    }
}

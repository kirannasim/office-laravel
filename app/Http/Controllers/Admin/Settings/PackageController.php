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

use App\Blueprint\Facades\PackageServer;
use App\Blueprint\Services\PackageServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\Package;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class PackageController
 * @package App\Http\Controllers\Admin\Settings
 */
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/ladda/spin.min.js'),
                asset('global/plugins/ladda/ladda.min.js'),
                asset('global/plugins/summernote/summernote.min.js'),
            ],
            'styles' => [
                asset('pages/css/pricing.min.css'),
                asset('global/plugins/ladda/ladda-themeless.min.css'),
                asset('global/plugins/summernote/summernote.css'),
            ],
            'title' => _t('settings.Package_Management'),
            'heading_text' => _t('settings.Package_Management'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _t('settings.Package_Management') => 'package',
                _t('settings.Package_Management') => 'package'
            ]
        ];

        return view('Admin.Settings.package', $data);
    }

    /**
     * @param null $packageId
     * @param PackageServices $packageServices
     * @return Factory|View
     */
    function getForm($packageId = null, PackageServices $packageServices)
    {
        $data = [
            'cart_status' => cartStatus(),
            'packageData' => collect([]),
        ];

        if ($packageId) {
            $data['packageData'] = collect($packageServices->getindividualPackage($packageId));
            $data['package_id'] = $packageId;
        }

//        if ($data['cart_status'])
//            $data['cart_languages'] = $cartManager->getLanguages();

        return view('Admin.Settings.Partials.Package.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param PackageServices $packageServices
     * @param UtilityServices $utilityServices
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function store(Request $request, PackageServices $packageServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        if ($request->input('action') != 'delete') {
            $validator = Validator::make($request->all(), $this->packageValidationRules(), $this->packageValidationMessages());

            if ($validator->fails())
                return response()->json($validator->errors(), 422);
        }

        switch ($request->input('action')) {
            case 'insert':
                $packageServices->addPackages($request);
                break;
            case 'edit':
                $packageServices->updatePackage($request);
                break;
            case 'delete':
                $packageServices->deletePackage($request->id);
                break;
            default:
                return response()->json(['status' => false]);
                break;
        }

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'package_updated', 'data' => [
            'action' => $request->input('action'),
            'data' => $request->all(),
            'on_user_id' =>loggedId()
        ]]);

        return json_encode(['status' => true, 'action' => $request->input('action')]);
    }

    /**
     * @return void
     */
    function packageValidationRules()
    {
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required',
            'pv' => 'required|numeric',
            'price' => 'required|numeric',
        ];

//      if (cartStatus())
//          $rules = $cartManager->ProductValidationRules();
//

        return defineFilter('packageFormValidationRules', $rules);
    }

    /**
     * @return void
     */
    function packageValidationMessages()
    {
        $messages = [
            'name' => _t('settings.please_enter_package_name'),
            'description' => _t('settings.please_enter_package_description'),
            'pv' => _t('settings.please_enter_package_product_value'),
            'price' => _t('settings.please_enter_package_price'),
        ];

        return defineFilter('packageFormValidationMessages', $messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'edit_status' => true,
            'ind_package' => PackageServer::getindividualpackage($id),
            'packages' => PackageServer::getActivePackages(),
        ];

        return view('Admin.Settings.package', $data);
    }

    /**show products available
     *
     * @param PackageServices $packageServices
     * @return Factory|View
     */
    public function getList(PackageServices $packageServices)
    {
        $data['packages'] = $packageServices->getActivePackages();

        return view('Admin.Settings.Partials.Package.package_list', $data);
    }

    /**show products available
     *
     * @param null $type
     * @param PackageServices $packageServices
     * @return Factory|View
     */
    public function showPackages($type = null, PackageServices $packageServices)
    {
        $data['packages'] = $packageServices->getActivePackages();
        if ($type)
            return view('Admin.Settings.Partials.Package.package' . ucfirst($type), $data);

        return view('Admin.Settings.Partials.Package.package', $data);
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function changeStatus(Request $request)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);

        $id = $request->input('id');
        $package = Package::find($id);
        $status = $package->status ? 0 : 1;

        $package->update(['status' => $status]);
    }
}
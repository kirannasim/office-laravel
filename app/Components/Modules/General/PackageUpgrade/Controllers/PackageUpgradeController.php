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

namespace App\Components\Modules\General\PackageUpgrade\Controllers;

use App\Blueprint\Services\CartServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\PackageUpgrade\PackageUpgradeIndex as Module;
use App\Eloquents\ModuleData;
use App\Eloquents\Package;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

/**
 * Class PackageUpgradeController
 * @package App\Components\Modules\General\PackageUpgrade\Controllers
 */
class PackageUpgradeController extends Controller
{

    public $module;

    /**
     * PackageUpgradeController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app(Module::class);
    }


    /**
     * @param string $status
     * @param CartServices $cartServices
     * @return Factory|View
     */
    function packageUpgrade($status = null, CartServices $cartServices)
    {
        $user = loggedUser();
        if (!$user->package)
            return abort(403, 'You are not holding any packages right now.');

        CartServices::setContext('package_upgrade');
        $data = [
            'title' => _mt($this->module->moduleId, 'PackageUpgrade.package_upgrade'),
            'heading_text' => _mt($this->module->moduleId, 'PackageUpgrade.package_upgrade'),
            'breadcrumbs' => [
                _t('index.home') => "user.home",
                _mt($this->module->moduleId, 'PackageUpgrade.package_upgrade') => 'user.packageUpgrade'
            ],
            'packages' => Package::where('status', 1)->where('id', '>', $user->package->id)->where('in_upgrade', 1)->limit(1)->get(),
            'moduleId' => $this->module->moduleId,
            'cartedPackage' => $cartServices->getCartedPackage(),
            'cartTotal' => $cartServices->cartTotal()->get('total'),
            'status' => $status,
            'currentPackage' => $user->package,
            'moduleData' => getModule($this->module->moduleId)->getModuleData(true),
        ];

        return view('General.PackageUpgrade.Views.upgrade', $data);
    }

    /**
     * @param CartServices $cartServices
     * @param UserServices $userServices
     * @return JsonResponse
     */
    function validatePackageSelected(CartServices $cartServices, UserServices $userServices)
    {
        if (!$cartedPackage = $cartServices->getCartedPackage())
            return response()->json(['error' => _mt($this->module->moduleId, "PackageUpgrade.please_select_a_valid_package")], 422);

        $user = loggedUser();
        if (!$user->package)
            response()->json(['error' => 'You are not holding any packages right now.'], 422);

        if ($user->package->id > Package::find($cartedPackage)->id)
            return response()->json(['error' => _mt($this->module->moduleId, "PackageUpgrade.please_select_a_valid_package")], 422);
    }

}

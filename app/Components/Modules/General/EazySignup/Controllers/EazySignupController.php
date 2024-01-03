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

namespace App\Components\Modules\General\EazySignup\Controllers;

use App\Blueprint\Services\CartServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Traits\Registration\JsLanguages;
use App\Components\Modules\General\EazySignup\EazySignupIndex as Module;
use App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class EazySignupController
 * @package App\Components\Modules\General\EazySignup\Controllers
 */
class EazySignupController extends Controller
{
    use JsLanguages;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @param CartServices $cartServices
     * @return Factory|View
     */
    function index(CartServices $cartServices)
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'EasySignup.easy_signup'),
            'heading_text' => _mt($this->module->moduleId, 'EasySignup.easy_signup'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'EasySignup.easy_signup') => getScope() . '.eazySignup',
            ],
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
                asset('global/plugins/jquery-validation/js/jquery.validate.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('js/register.js'),
                asset('global/plugins/jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'),
            ],
            'styles' => [
                asset('css/admin/registration.css'),
                asset('global/plugins/animate/animate.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                asset('css/welcome_style.css'),
            ],
            'moduleId' => $this->module->moduleId,
            'countries' => getCountries()->filter(function ($country) {
                return !in_array($country->code, json_decode(getConfig('localization', 'countries')));
            })->toArray(),
            'placement' => null,
            'package_status' => getConfig('package', 'status'),
            'cartTotal' => prettyCurrency($cartServices->cartTotal()->get('total')),
            'username_type' => getConfig('username', 'type'),
            'sponsor' => getAdminUser()->username,
            'layoutPrefix' => loggedUser() ? ucfirst(loggedUser()->userType->title) . '.' : 'Guest',
            'jsVariables' => array_merge($this->jsVars, $this->setJsLanguages())
        ];

        return view('General.EazySignup.Views.index', $data);
    }


    /**
     * @param Request $request
     * @param UserServices $userServices
     * @return JsonResponse
     */
    public function register(Request $request, UserServices $userServices)
    {

        $rules = [
            'sponsor' => 'required|exists:users,username',
            'username' => 'required|min:2|unique:users',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|min:2|unique:users', 'email',
            'password_confirmation' => 'min:6',
            //'placement' => 'required_with:position',
            //'position' => 'required_with:placement',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'pin' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $request->merge([
            'products' => [
                ['productId' => 4]
            ],
            'selectedPackage'=>4,
        ]);

        DB::transaction(function () use ($request, $userServices) {
            $data['user'] = $userServices->addUser(collect($request->all()));
            defineAction('postAddUser', 'registration', collect(['result' => $data]));
            EasySignupHistory::create(['data' => $request->all()]);
        });
    }
}

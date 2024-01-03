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

namespace App\Blueprint\Traits\Registration;

use App\Blueprint\Facades\MailServer;
use App\Blueprint\Services\CartServices;
use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\PackageServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Traits\RedirectsUsers;
use App\Eloquents\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Eloquents\User;

/**
 * Trait RegistersUsers
 * @package App\Blueprint\Traits
 */
trait RegistersUsers
{
    use RedirectsUsers;

    use JsLanguages;

    protected $gateway;

    /**
     * Show the application registration form.
     *
     * @param Request $request
     * @param CartServices $cartServices
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request, CartServices $cartServices)
    {
        $data['title'] = _t('register.register_new_user');
        $data['heading_text'] = _t('register.register_new_user');
        $data['breadcrumbs'] = [_t('index.home') => 'admin.home', _t('register.register_new_user') => 'register'];
        $scope = getScope();
        $scripts = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'),
            asset('pages/scripts/form-wizard.js'),
            asset('js/register.js'),
            asset('global/plugins/jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'),
            asset('js/printThis.js'),
        ];
        $styles = [
            asset('global/plugins/animate/animate.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('css/welcome_style.css'),
            asset('css/admin/registration.css'),
        ];

        $data['jsVariables'] = array_merge($this->jsVars, $this->setJsLanguages());
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['doneAlready'] = $request->input('registered');
        $data['orderId'] = $request->input('orderId');

        $sponsor = null;
        $sponsor_set_by_cookie = false;

        //If this is a logged in user so he will be the sponsor
        //If this is admin he can edit the sponsor field
        // if (loggedId()) {
        //     $sponsor = \Auth::user()->username;
        //     if (!isAdmin()) {
        //         $sponsor_set_by_cookie = true;
        //     }
        // }

       // $sponsor = "testuser";
        //Sponsor based on cookie / affiliation referral middelware
        if (!$sponsor && $affiliationCookie = Cookie::get('affiliation_code')) {
            $sponsor_user = User::where('customer_id', $affiliationCookie)->first();
            if ($sponsor_user) {
                $sponsor = $sponsor_user->username;
                $sponsor_set_by_cookie = true;
            }
        }


        $placement = null;
        if ($request->input('placement')) $placement = $request->input('placement');

        // if (loggedId() && !isAdmin()) {
        //         $placement = null;
        // }

        $data['sponsor_set_by_cookie'] = $sponsor_set_by_cookie;
        $data['sponsor'] = $sponsor;
        $data['placement'] = $placement;
        $data['countries'] = getCountries()->toArray();
        $data['layoutPrefix'] = loggedUser() ? ucfirst(loggedUser()->userType->title) . '.' : 'Guest';
        $data['cartTotal'] = prettyCurrency($cartServices->cartTotal()->get('total'));

        return view('Auth.register', $data);
    }

    /**
     * @param string $style
     * @param PackageServices $packageServices
     * @param CartServices $cartServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function packages($style = 'grid', PackageServices $packageServices, CartServices $cartServices)
    {
        $data = [
            'packages' => $packageServices->getRegistrationPackages(),
            'cartedPackage' => $cartServices->getCartedPackage(),
            'adminFee' => getModule('CartTotal-AdministrationFee')->getModuleData(true)->get('amount')
        ];
        
        return view('Auth.Partials.package' . Str::ucfirst($style), $data);
    }

    /**
     * Show gateways
     *
     * @param ModuleServices $moduleServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    function gateways(ModuleServices $moduleServices)
    {
        //dd($moduleServices->getPaymentPool(true));
        $data['paymentGateways'] = array_values(array_filter($moduleServices->getPaymentPool(true), function ($gateway) {
            return $gateway->moduleId != callModule('Payment-BusinessWallet')->moduleId;
        }));

        return view('Auth.Partials.gateways', $data)->render();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @param UserServices $userServices
     * @return \App\Eloquents\User
     */
    public function register(Request $request, UserServices $userServices, ExternalMailServices $externalMailServices)
    {
        $user = $userServices->addUser($request);
        $externalMailServices->createMailData(['type' => 'registration', 'userId' => $user->id]);

        if (!$user) return response()->json([
            'status' => false
        ], 422);

        //event(new PostRegistration($user));
        //$this->guard()->login($user);

        return $user;
    }

    /**
     * Registration preview
     *
     * @param $order_id
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function registerPreview($order_id, Order $order)
    {
        $data = [];
        $id = $order->find($order_id)->user_id;
        $current_language = app('laravellocalization')->getCurrentLocale();
        $letter_body = getConfig('welcome_letter', $current_language);
        $data['welcome_letter'] = MailServer::ReplaceLetterBody($id, $letter_body);
        $data['order_id'] = $order_id;
        $scope = session()->get('theScope');
        $data['layoutPrefix'] = $scope ? $scope . '.' : 'Guest';

        return view('Auth.preview', $data);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}

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

namespace App\Http\Controllers\Auth;

use App\Blueprint\Traits\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blueprint\Services\PackageServices;
use App\Blueprint\Services\CartServices;

use Illuminate\Support\Str;



/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * What type of user attempting to login.
     *
     * @var string
     */
    protected $scope;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        //$this->middleware('guest', ['except' => 'logout']);
        $this->scope = session('theScope');
        $this->redirectTo = ($this->scope == 'Admin')?route('admin.home'):route('user.home');
    }

    public function packages($style = 'grid', PackageServices $packageServices, CartServices $cartServices)
    {
        $data = [
            'packages' => $packageServices->getRegistrationPackages(),
            'cartedPackage' => $cartServices->getCartedPackage(),
            'adminFee' => getModule('CartTotal-AdministrationFee')->getModuleData(true)->get('amount')
        ];
        
        return view('Auth.Partials.package' . Str::ucfirst($style), $data);
    }
}

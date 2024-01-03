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

namespace App\Blueprint\Traits;

use App\Blueprint\Services\UtilityServices;
use App\Eloquents\User;
use App\Eloquents\Retortal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Trait AuthenticatesUsers
 * @package App\Blueprint\Traits
 */
trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        $scope = session('theScope') ?: 'user';
        $view_type = ($scope == 'user') ? (getConfig('design', 'login_view') ?: 'Standard') : 'Standard';
        $scripts = [
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('js/' . ucfirst($scope) . '/login.js'),
        ];
        $styles = [
            asset('global/plugins/ladda/ladda-themeless.min.css'),
        ];
        $styles[] = asset('css/' . $scope . '/login' . $view_type . '.css');
        $data['styles'] = $styles;
        $data['title'] = _t('index.dashboard');
        $data['title'] = 'Login';
        $data['headScripts'] = $scripts;
        $data['action'] = $scope . '.loginAction';
        $data['sliderImages'] = [asset(getConfig('design', 'modern_login_slider_1')), asset(getConfig('design', 'modern_login_slider_2')), asset(getConfig('design', 'modern_login_slider_3'))];
        $view = 'Auth.' . $scope . 'Login' . $view_type;
        $company_data = getConfig('company_info');

        foreach ($company_data as $company_info)
            $data[$company_info['meta_key']] = $company_info['meta_value'];

        return view($view, $data);
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @param UtilityServices $utilityServices
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request/*, CartManager $cartManager*/, UtilityServices $utilityServices)
    {
        $scope = session('theScope');
        //$this->redirectTo = route($scope . '.home');
        $this->redirectTo = defineFilter('redirectAfterLogin', route($scope . '.home'), 'login');

        if (($validator = $this->validateLogin($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            // $cartManager->cart->login();
            defineAction('postLoginActions', 'login', $request);
            $userID = User::where('username','LIKE',$request->input('username'))->pluck('id')->first();
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'login','on_user_id'=>$userID]);
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return Validator
     */
    protected function validateLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        $validator->after(function ($validator) use ($request) {
            $scope = session('theScope');
            /** @var User $user */
            if (!$user = User::where($this->username(), $request->username)->first())
                $validator->errors()->add($this->username(), "Invalid username or password!");

            if ($user && $user->userType()->first()->title != getScope())
                $validator->errors()->add($this->username(), "Only $scope can login here!");

            if ($attemptUser = idFromUsername($request->username)) {
                if (!checkAccess($attemptUser, 'login'))
                    $validator->errors()->add($this->username(), "you don't have login permission");
            }

            $validator = defineFilter('loginValidator', $validator, 'root');

        });
        return $validator;
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected
    function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected
    function credentials(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->input('username'), 'password' => $request->input('password')];
        }

        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);


        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */

    protected function authenticated(Request $request, $user)
    {
        $redirectTo = session('url.intended', $this->redirectPath());

        //Retortal SSO
        //https://office.elysiumnetwork.io/user/login?redirect_back=soho
        if ($request->has('redirect_back') && 'soho' == $request->input('redirect_back')) {
            $redirectTo = Retortal::getRetortalLoginUrl($user);
        }
        if ($request->has('redirect_back')) {
            switch(strtolower($request->input('redirect_back'))) {
                case 'soho':
                    $redirectTo = Retortal::getRetortalLoginUrl($user);
                break;

                case 'soho-dev':
                    $redirectTo = Retortal::getRetortalDevLoginUrl($user);
                break;
            }
        }

        return response()->json(['status' => true, 'redirect' => $redirectTo]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $scope = session('theScope');

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($scope . '/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}

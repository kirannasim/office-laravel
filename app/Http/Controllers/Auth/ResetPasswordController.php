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

use App\Blueprint\Services\UtilityServices;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param Request $request
     * @param string|null $token
     * @return Factory|View
     */
    public function showResetForm(Request $request, $token = null)
    {
        $scope = session('theScope');
        $view = 'Auth.' . $scope . 'loginStandard';
        $data = [];
        $styles = [
            asset('css/' . $scope . '/login.min.css'),
        ];

        $scripts = [
            asset('js/' . $scope . '/passwordReset.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
        ];
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['token'] = $token;
        $data['email'] = $request->email;
        $data['resetForm'] = true;
        $data['loginLink'] = route($scope . '.login');
        $data['action'] = $scope . '.password.reset.request';

        return view('Auth.resetPasswordForm', $data);
    }

    /**
     * @param $response
     * @return JsonResponse
     */
    protected function sendResetResponse($response)
    {
        defineAction('postPasswordResetAction', 'password_change');

        return response()->json(['status', trans($response)]);
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param Request
     * @param string $response
     * @return RedirectResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['token' => trans($response)], 422);
    }

    /**
     * Reset the given user's password.
     *
     * @param CanResetPassword $user
     * @param string $password
     * @param UtilityServices $utilityServices
     * @return void
     */
    protected function resetPassword($user, $password, UtilityServices $utilityServices)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'password_change', 'data' => [], 'userId' => $user->id,'on_user_id' =>$user->id]);
    }
}

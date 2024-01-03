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

namespace App\Http\Controllers\Admin\Profile;

use App\Blueprint\Services\ConfigServices;
use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\LocationServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Services\UtilityServices;
use App\Blueprint\Traits\ProfileFields;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Admin\Profile
 */
class ProfileController extends Controller
{
    use ProfileFields;

    /**
     * index function
     *
     * @param TransactionServices $transactionServices
     * @param UserServices $userServices
     * @return Factory|View
     */
    function index(TransactionServices $transactionServices, UserServices $userServices)
    {
        $data = [
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
                asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/jquery.sparkline.min.js'),
                asset('global/plugins/summernote/summernote.min.js')
            ],
            'styles' => [
                asset('pages/css/profile.min.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                asset('global/plugins/summernote/summernote.css')
            ],
            'countries' => getCountries()->toArray(),
            'id' => $id = loggedId(),
            'profile' => $userServices->getUserProfile($id),
            'transactions' => $transactionServices->getTransaction(),
            'title' => _t('profile.profile'),
            'heading_text' => _t('profile.profile'),
            'breadcrumbs' => [
                _t('index.home') => getScope() . '.home',
                _t('index.profile') => getScope() . '.profile',
            ]
        ];

        return view('Admin.Profile.UserProfile', $data);
    }

    /**
     * Update user profile
     *
     * @param ProfileUpdate $request [description]
     * @param ExternalMailServices $externalMailServices
     * @param ConfigServices $configServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function update(ProfileUpdate $request, ExternalMailServices $externalMailServices, ConfigServices $configServices, UtilityServices $utilityServices)
    {
        if (isDemoVersion())
            return response("You can't manage modules in demo mode", 403);


        $user = loggedUser();
        $userData = [
            'basicInfo' => collect($user)->only(['username', 'email', 'phone', 'password'])->all(),
            'metaInfo' => $user->metaData
        ];

        $basicInfo = collect($request->input('profile.basic'));
        $metaInfo = collect($request->input('profile.meta'));

        if ($request->input('current_password'))
            $basicInfo->put('password', bcrypt($request->password));

        $userInstance = User::find($request->user()->id);
        $metaInstance = $userInstance->metaData();


        $userInstance->update($basicInfo->only($this->basicFields())->all());
        $metaInstance->update($metaInfo->only($this->metaFields())->all());
        if ($request->input('current_pin') && Hash::check($request->input('current_pin'), $configServices->getConfigData('security', 'pin'))) {
            $configId = $configServices->getConfigId('security', 'pin');
            $configServices->saveConfigData($configId, [
                'meta_value' => bcrypt($request->pin),
                'status' => 1,
            ]);
        }

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'profile_update', 'data' =>
            [
                'prev_basic_info' => $userData['basicInfo'],
                'updated_basic_info' => $basicInfo,
                'prev_meta_info' => $userData['metaInfo'],
                'updated_meta_info' => $metaInfo
            ],
            'on_user_id' => $request->user()->id,
        ]);

        if ($request->input('current_password')) {
            defineAction('postPasswordResetAction', 'password_change', ['user_id' => loggedId()]);
            $externalMailServices->sendPasswordChangeMail(['userId' => loggedId()]);
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'password_change', 'data' => [], 'on_user_id' =>loggedId()]);
        }


//        //Update cart data
//        if (cartStatus() && getConfig('profile_sync'))
//            $cartManager->updateProfile($request);

        return response()->json(['status' => true]);
    }

    /**
     * save logged user Profile pIc
     * @param Request $request
     */
    public function saveProfilePic(Request $request)
    {
        $userId = loggedId();
        UserMeta::where('user_id', $userId)->update(['profile_pic' => $request->proPicInput]);
    }


    /**
     * Request Ewallet units
     *
     * @param Request $request
     * @return JsonResponse
     */
    function requestUnit(Request $request)
    {
        if (!$unit = $request->input('unit')) return response()->json(['status' => false, 'message' => 'The action is not allowed !']);

        return defineFilter('profileUnit', method_exists($this, $unit) ? app()->call([$this, $unit], (array)$request->input('args')) : '', 'unitFilter', $unit);
    }

    /**
     * @param UserServices $userServices
     * @return Factory|View
     */
    function editProfile(UserServices $userServices)
    {
        $userID = loggedId();
        $data = [];
        $data['profile'] = $userServices->getUserProfile($userID);
        $data['countries'] = getCountries();

        return view('Admin.Profile.Partials.editProfile', $data);
    }

    /**
     * @param UserServices $userServices
     * @param LocationServices $locationServices
     * @return Factory|View
     */
    function overview(UserServices $userServices, LocationServices $locationServices)
    {
        $data = [];
        $userID = loggedId();
        $profile = $userServices->getUserProfile($userID);
        $profile->Country = $locationServices->getCountryNameFromID($profile->metaData->country_id);
        $profile->state = $locationServices->getStateNameFromID($profile->metaData->state_id);
        $profile->city = $locationServices->getCityNameFromID($profile->metaData->city_id);
        $data['profile'] = $profile;
        $data['countries'] = getCountries();

        return view('Admin.Profile.Partials.overview', $data);
    }
}

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

namespace App\Http\Controllers\User\Profile;

use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\LocationServices;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Services\UtilityServices;
use App\Blueprint\Traits\ProfileFields;
use App\Eloquents\User;
use App\Blueprint\Traits\UserDataFilter;
use App\Eloquents\UserMeta;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;

/**
 * Class ProfileController
 * @package App\Http\Controllers\User\Profile
 */
class ProfileController extends Controller
{
    use ProfileFields,UserDataFilter;

    /**
     * index function
     *
     * @param string $id user id
     * @param TransactionServices $transactionServices
     * @param UserServices $userServices
     * @return Factory|View
     */

    function index(TransactionServices $transactionServices, UserServices $userServices)
    {
        $id = loggedId();

        $scripts = array(
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/jquery.sparkline.min.js'),
            asset('global/plugins/summernote/summernote.min.js')

        );
        $styles = array(
            asset('pages/css/profile.min.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/summernote/summernote.css')
        );
        $data = [];
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['countries'] = getCountries();
        $data['profile'] = $userServices->getUserProfile($id);
        $data['id'] = $id;
        $data['transactions'] = $transactionServices->getTransaction();

        $data['title'] = _t('profile.profile');
        $data['heading_text'] = _t('profile.profile');
        $data['breadcrumbs'] = [
            _t('index.home') => strtolower(getScope()) . '.home',
            _t('index.profile') => getScope() . '.profile',
        ];

        return view('User.Profile.UserProfile', $data);
    }

    // function resetPassword(){
        
    // }
    function personalinfo(TransactionServices $transactionServices, UserServices $userServices)
    {
        $id = loggedId();

        $scripts = array(
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/jquery.sparkline.min.js'),
            asset('global/plugins/summernote/summernote.min.js')

        );
        $styles = array(
            asset('pages/css/profile.min.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/summernote/summernote.css')
        );

        
        
        $data = [];
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['countries'] = getCountries();
        $data['user'] = $userServices->getUserProfile($id);


        $data['id'] = $id;
        $data['transactions'] = $transactionServices->getTransaction();

        $data['title'] = _t('profile.profile');
        $data['heading_text'] = _t('profile.profile');
        $data['breadcrumbs'] = [
            _t('index.home') => strtolower(getScope()) . '.home',
            _t('index.profile') => getScope() . '.profile',
        ];

        return view('User.Profile.PersonalInfo', $data);
    }

    function expirepayment(TransactionServices $transactionServices, UserServices $userServices)
    {
        $id = loggedId();

        $scripts = array(
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/jquery.sparkline.min.js'),
            asset('global/plugins/summernote/summernote.min.js')

        );
        $styles = array(
            asset('pages/css/profile.min.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/summernote/summernote.css')
        );

        
        
        $data = [];
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;

        $data['title'] = _t('profile.profile');
        $data['heading_text'] = _t('profile.profile');
        $data['breadcrumbs'] = [
            _t('index.home') => strtolower(getScope()) . '.home',
            _t('index.profile') => getScope() . '.profile',
        ];

        return view('User.Profile.expirepayment', $data);
    }

    function testregister()
    {
        return view('Auth.testregister');
    }
    function tool()
    {
        return view('User.Profile.tool');
    }

    function report()
    {
        return view('User.Profile.report');
    }

    function email()
    {
        return view('User.Profile.email');
    }

    function wallet()
    {
        return view('User.Profile.wallet');   
    }

    function withdraw()
    {
        return view('User.Profile.withdraw');      
    }

    function packageupgrade()
    {
        
    }
    /**
     * Update user profile
     *
     * @param ProfileUpdate $request [description]
     * @param ExternalMailServices $externalMailServices
     * @param UtilityServices $utilityServices
     * @return JsonResponse
     */
    function update(Request $request, ExternalMailServices $externalMailServices, UtilityServices $utilityServices)
    {
        switch ($request->get('update_type')){
            case 'personalinfo':{
                $request->validate(
                    [
                        'email' => 'required|email|min:2|unique:users,email,' . loggedId() . ',id',
                        'phone' => 'required',
                        'firstname' => 'required',
                        'lastname' => 'required',
                        'country_id' => 'required',
                        'city' => 'required',
                        'street_name' => 'required',
                        'house_no' => 'required',
                        'postcode' => 'required',
                        'gender' => 'required',
                    ]
                );
                break;
            }
            case 'accountinfo':{
                $request->validate(
                    [
                        'password' => 'required',
                        'password_confirmation' => 'same:password',
                        'username' => 'required|min:5|unique:users,username,' . loggedId() . ',id',
                    ]
                );
                break;
            }
            case 'legalinfo':{
                $request->validate(
                    [
                        'dob' => 'required',
                        'nationality' => 'required',
                        'place_of_birth' => 'required',
                        'passport_no' => 'required|alpha_num',
                        'date_of_passport_issuance' => 'required',
                        'country_of_passport_issuance' => 'required',
                        'passport_expirition_date' => 'required',
                    ]
                );
                break;
            }
        }

        //var_dump ($request->all()); 
        //var_dump('-------------------------------------------------');
        $send_data = array();
        foreach ($request->all() as $key => $value) {
            
            if ($key == 'country_of_passport_issuance') {
                $send_data[$key] = (int)$value;
            } else {
                $send_data[$key] = $value;
            }            
        }

        //var_dump($send_data); exit;

        $user = loggedUser();
        $meta = $this->formatMetaData(collect($send_data));
        //var_dump($meta); exit;
        UserMeta::where('user_id','=', loggedId())->update($meta);
        $user->update(collect($send_data)->only(['customer_id', 'username','email','phone'])->all());

        $userData = [
            'basicInfo' => collect($user)->only(['username', 'email', 'phone', 'password'])->all(),
            'metaInfo' => $user->metaData
        ];

        $basicInfo = collect($request->input('profile.basic'));
        $metaInfo = collect($request->input('profile.meta'));

        if ($request->input('current_password'))
            $basicInfo->put('password', bcrypt($request->password));
        $userInstance = User::find(loggedId());
        $metaInstance = $userInstance->metaData();

        $userInstance->update($basicInfo->only($this->basicFields())->all());
        $metaInstance->update($metaInfo->only($this->metaFields())->all());

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'profile_update', 'data' =>
            [
                'prev_basic_info' => $userData['basicInfo'],
                'updated_basic_info' => $basicInfo,
                'prev_meta_info' => $userData['metaInfo'],
                'updated_meta_info' => $metaInfo
            ],
            'on_user_id' => loggedId(),
        ]);

        if ($request->input('current_password')) {
            defineAction('postPasswordResetAction', 'password_change', ['user_id' => loggedId()]);
            //$externalMailServices->sendPasswordChangeMail(['userId' => loggedId()]);
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'password_change', 'data' => [],'on_user_id' => loggedId()]);
        }


        session()->put('success', 'Update complete');
        //Update cart data
//        if (cartStatus() && getConfig('profile_sync'))
//            $cartManager->updateProfile($request);

        return redirect()->route('user.personalinfo');
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

        return view('User.Profile.Partials.editProfile', $data);
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
        $profile->country = $locationServices->getCountryNameFromID($profile->metaData->country_id);
        $profile->state = $locationServices->getStateNameFromID($profile->metaData->state_id);
        $profile->city = $locationServices->getCityNameFromID($profile->metaData->city_id);
        $data['profile'] = $profile;
        $data['countries'] = getCountries();

        return view('User.Profile.Partials.overview', $data);
    }

    function referall($id)
    {
        Cookie::queue("affiliation_code",$id,1);
        return redirect(route('user.register'));
    }
}

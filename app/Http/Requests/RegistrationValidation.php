<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 *  @author Acemero Technologies Pvt Ltd
 *  @link https://www.acemero.com
 *  @see https://www.hybridmlm.io
 *  @version 1.00
 *  @api Laravel 5.4
 */

namespace App\Http\Requests;

use App\Blueprint\Facades\UserServer;
use App\Blueprint\Services\ConfigServices;
use App\Eloquents\HoldingUsers;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegistrationValidation
 * @package App\Http\Requests
 */
class RegistrationValidation extends FormRequest
{
    protected $customAttributes = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param ConfigServices $config
     * @return array
     */
    public function rules(ConfigServices $config)
    {
        list($rules, $attributes) = $config->fieldValidationPreProcess($this);
        $this->customAttributes = $attributes;
        return array_merge($rules, [
            'sponsor' => 'required|exists:users,username',
            'username' => getConfig('registration', 'username_type') == 'static' ? "required|alpha_num|min:5|unique:users,username" : "",
            'password' => 'required|min:6|confirmed',
            'email'  =>  'required|email|min:2|unique:users','email',
            /*'password_confirmation' => 'min:6|confirmed',*/
            /*'placement' => 'required_with:position',*/
            'phone' => 'required',
            //'gender' => 'required',
            //'address' => 'required',
            //'country_id' => 'required',
            //'state_id' => 'required',
            //'city_id' => 'required',
            //'firstname' => 'required',
            //'lastname' => 'required',
            //'pin' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            //'type_of_document' => 'required',
            'passport_no' => 'required|alpha_num',
            'nationality' => 'required',
            'place_of_birth' => 'required',
            'date_of_passport_issuance' => 'required',
            'country_of_passport_issuance' => 'required',
            'passport_expirition_date' => 'required',
            'street_name' => 'required',
            'house_no' => 'required',
            'postcode' => 'required',
            'address_country' => 'required',
            'gateway' => 'required|exists:modules,id',
        ]);
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $placement = $this->input('placement');
        $position = $this->input('position');

        if ($placement && $position) {
            $validator->after(function ($validator) use ($placement, $position) {
                // if (UserServer::verifyPlacement($placement, $position)) {
                //     $validator->errors()->add('placement', _t('register.invalid_placement_or_position'));
                // }
            });
        }

       /* if(HoldingUsers::where('username',$this->input('username'))->exists())
            return $validator->errors()->add('placement', 'username already exist');*/

        /*if(HoldingUsers::where('email',$this->input('email'))->exists())
            return $validator->errors()->add('placement', 'email already exist');*/
    }

    /**
     * attributes for form validation
     *
     * @return array
     */
    function attributes()
    {
        return $this->customAttributes;
    }
}
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

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

/**
 * Class ProfileUpdate
 * @package App\Http\Requests
 */
class ProfileUpdate extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        //dd('profile.basic.email');
        return [

            'password_confirmation' => 'same:password',
            'profile.basic.username' => 'required|min:5|unique:users,username,' . $this->user()->id . ',id',
            'profile.basic.email' => 'required|email|min:2|unique:users,email,' . $this->user()->id . ',id',
            'profile.basic.phone' => 'required',
            'profile.meta.gender' => 'required',
            'profile.meta.firstname' => 'required',
            'profile.meta.lastname' => 'required',
            'profile.meta.dob' => 'required',
            'profile.meta.country_id' => 'required',
            'profile.meta.city' => 'required',
            'profile.meta.nationality' => 'required',
            'profile.meta.place_of_birth' => 'required',
            'profile.meta.passport_no' => 'required|alpha_num',
            'profile.meta.date_of_passport_issuance' => 'required',
            'profile.meta.country_of_passport_issuance' => 'required',
            'profile.meta.passport_expirition_date' => 'required',
            'profile.meta.street_name' => 'required',
            'profile.meta.house_no' => 'required',
            'profile.meta.postcode' => 'required',
        ];

    }

    /**
     * Configure the validator instance.
     *
     * @param Validator $validator
     * @return void
     */

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $validator->sometimes('current_password', 'required|min:6|confirmed', function ($input) {
                return $input->current_password == true;
            });
            if ($this->input('current_password')) {
                if (!Hash::check($this->input('current_password'), $this->user()->password))
                    $validator->errors()->add('current_password', 'Current password is incorrect');
                //return \response(['current_password' => 'Current password is incorrect'],  422);
            }
        });
    }
}

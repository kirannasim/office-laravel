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

/**
 * Trait RegistersUsers
 * @package App\Blueprint\Traits
 */
trait JsLanguages
{
    /**
     * Show the application registration form.
     *
     * @return array
     */
    public function setJsLanguages()
    {
        $jsVars = [
            'sessionKey' => session('advFieldName'),
            'localApi' => route('local.api'),
            'cartAddRoute' => route('cart.add'),
            'cartSummary' => route('cart.summary'),
            'cartGetTotalRoute' => route('cart.getCartTotal'),
            'lang_you_have_added' => _t('register.you_have_added'),
            'lang_to_cart' => _t('register.to_cart'),
            'preview' => scopeRoute('register.preview', ['id' => '']),
            'gateways' => route('cart.payment'),
            //'gateways' => route('getGateways'),
            'packages' => scopeRoute('register.packages'),
            'isLogged' => loggedUser() ? true : false,
            'lang_err_enter_username' => _t('register.err_username_required'),
            'lang_err_enter_sponsor' => _t('register.err_sponsor_required'),
            'lang_err_enter_package' => _t('register.err_package_required'),
            'lang_err_enter_password' => _t('register.err_password_required'),
            'lang_err_enter_confirm_password' => _t('register.err_confirm_password_required'),
            'lang_err_confirm_password_missmatch' => _t('register.err_confirm_password_missmatch'),
            'lang_err_enter_firstname' => _t('register.err_firstname_required'),
            'lang_err_enter_lastname' => _t('register.err_lastname_required'),
            'lang_err_enter_email' => _t('register.err_email_required'),
            'lang_err_enter_phone' => _t('register.err_phone_required'),
            'lang_err_enter_gender' => _t('register.err_gender_required'),
            'lang_err_enter_address' => _t('register.err_address_required'),
            'lang_err_enter_city' => _t('register.err_city_required'),
            'lang_err_enter_country' => _t('register.err_country_required'),
            'lang_err_enter_state' => _t('register.err_state_required'),
            'lang_err_enter_pin' => _t('register.err_enter_pin'),
            'lang_err_enter_dob' => _t('register.err_enter_dob'),
            'lang_err_enter_atleast_5_character' => _t('register.err_atleast_5_character'),
            'lang_err_enter_atleast_6_character' => _t('register.err_atleast_6_character'),
            'lang_err_enter_type_of_document' => _t('register.err_enter_type_of_document'),
            'lang_err_enter_nationality' => _t('register.err_enter_nationality'),
            'lang_err_enter_place_of_birth' => _t('register.err_enter_place_of_birth'),
            'lang_err_enter_date_of_passport_issuance' => _t('register.err_enter_date_of_passport_issuance'),
            'lang_err_enter_country_of_passport_issuance' => _t('register.err_enter_country_of_passport_issuance'),
            'lang_err_enter_passport_expirition_date' => _t('register.err_enter_passport_expirition_date'),
            'lang_err_enter_street_name' => _t('register.err_enter_street_name'),
            'lang_err_enter_house_no' => _t('register.err_enter_house_no'),
            'lang_err_enter_postcode' => _t('register.err_enter_postcode'),
            'lang_err_enter_address_country' => _t('register.err_enter_address_country'),
        ];

        return $jsVars;
    }
}

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

/**
 * Trait ProfileFields
 * @package App\Blueprint\Traits
 */
trait ProfileFields
{

    /**
     * Basic user table datas
     *
     * @return array basic user data
     */
    function basicFields()
    {
        return ['username', 'password', 'email', 'phone'];
    }

    /**
     * fields only those are permitted to the insert query
     *
     * @return array permitted fields array
     */
    function metaFields()
    {
        return [
            'firstname',
            'lastname',
            'dob',
            'gender',
            'type_of_document',
            'country_id',
            'city',
            'address',
            'nationality',
            'place_of_birth',
            'date_of_passport_issuance',
            'country_of_passport_issuance',
            'passport_expirition_date',
            'street_name',
            'house_no',
            'postcode',
            'additional_info',
            'address_country',
            'profile_pic',
            'about_me',
            'facebook',
            'twitter',
            'linked_in',
            'passport_no',
            'google_plus',
        ];
    }
}

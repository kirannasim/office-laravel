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

namespace App\Blueprint\Services;

use App\Eloquents\City;
use App\Eloquents\Country;
use App\Eloquents\State;

/**
 * Class LocationServices
 * @package App\Blueprint\Services
 */
class LocationServices
{
    function __construct()
    {

    }

    /**
     * get all country
     *
     * @return Country[]|\Illuminate\Database\Eloquent\Collection collection
     */
    function getAllCountry()
    {
        return Country::where('active', 1)->get();
    }

    /**
     * get all states of specified country
     *
     * @param type $country_id integer
     * @return State[]|\Illuminate\Database\Eloquent\Collection collection
     */
    function getStates($country_id)
    {
        return State::where('country_id', $country_id)
            ->where('active', 1)
            ->get();
    }

    /**
     * get all city from state
     *
     * @param type $state_id integer
     * @return City[]|\Illuminate\Database\Eloquent\Collection collection
     */
    function getCity($state_id)
    {
        return City::where('state_id', $state_id)
            ->where('active', 1)
            ->get();
    }

    /**
     * get aphone code from country id
     *
     * @param type $country_id integer
     * @return type integer
     */
    function getPhoneCode($country_id)
    {
        $needle = (int)($country_id) > 0 ? 'id' : 'code';

        return Country::where($needle, $country_id)->first()->phonecode;
    }

    /**
     * Get Phone Number Masking
     *
     * @param $country_id
     * @return mixed
     */

    function getPhoneMask($country_id)
    {
        $needle = (int)($country_id) > 0 ? 'id' : 'code';

        return Country::where($needle, $country_id)->first()->phonemask;
    }

    /**
     * @param $countryId
     * @return mixed
     */
    function getCountryNameFromID($countryId)
    {
        return $countryId ? Country::find($countryId)->name : null;
    }

    /**
     * @param $stateID
     * @return mixed
     */
    function getStateNameFromID($stateID)
    {
        return $stateID ? State::find($stateID)->name : null;
    }

    /**
     * @param $cityID
     * @return mixed
     */
    function getCityNameFromID($cityID)
    {
        return $cityID ? City::find($cityID)->name : null;
    }
}

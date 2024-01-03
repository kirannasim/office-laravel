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

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;

/**
 * Class ApiLocal
 * @package App\Http\Controllers\Api
 */
class ApiLocal extends ApiAbstract
{
    /**
     * getCountries
     *
     * @return JsonResponse
     */
    function getCountries()
    {
        return response()->json(getCountries());
    }

    /**
     * get states of country
     *
     * @param array $params
     * @return JsonResponse
     */
    function getStates($params)
    {
        $country = isset($params['country']) ? $params['country'] : 101;
        return response()->json(getStates($country));
    }

    /**
     * get cities of states
     *
     * @param array $params
     * @return JsonResponse
     */
    function getCities($params)
    {
        $state = isset($params['state']) ? $params['state'] : 1;

        return response()->json(getCities($state));
    }

    /**get phone code
     *
     * @param array $params
     * @return JsonResponse
     */
    function getPhoneCode($params)
    {
        $country = isset($params['country']) ? $params['country'] : 101;

        return response()->json(getPhoneCode($country));
    }

    /**get phone mask
     *
     * @param array $params
     * @return JsonResponse
     */
    function getphonemask($params)
    {
        $country = isset($params['country']) ? $params['country'] : 101;

        return response()->json(getPhoneMask($country));
    }
}

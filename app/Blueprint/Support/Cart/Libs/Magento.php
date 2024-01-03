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

/**
 * Created by PhpStorm.
 * User: Hybrid MLM Software
 * Date: 10/31/2017
 * Time: 1:56 PM
 */

namespace App\Blueprint\Support\Cart\Libs;


use App\Blueprint\Interfaces\Cart\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class Magento
 * @package App\Blueprint\Support\Cart\Libs
 */
class Magento implements CartInterface
{
    /**
     * Login to cart
     *
     * @return mixed
     */
    function login()
    {
        // TODO: Implement login() method.
    }

    /**
     * Update user profile
     *
     * @return mixed
     */
    function updateProfile(Request $request)
    {
        // TODO: Implement updateProfile() method.
    }

    /**
     * Change password
     *
     * @return mixed
     */
    function changePassword()
    {
        // TODO: Implement changePassword() method.
    }

    /**
     * Extract credentials from request to be used with blueprint auth system
     *
     * @param Request $request
     * @return mixed
     */
    function extractCredentials(Request $request)
    {
        // TODO: Implement extractCredentials() method.
    }

    /**
     * @param Request|\Request $request
     * @return mixed
     */
    function setAuthCookie(Request $request)
    {
        // TODO: Implement setAuthCookie() method.
    }

    /**
     * Add cart product
     *
     * @param Collection $data
     * @return mixed
     */
    function addProduct(Collection $data)
    {
        // TODO: Implement addProduct() method.
    }
}

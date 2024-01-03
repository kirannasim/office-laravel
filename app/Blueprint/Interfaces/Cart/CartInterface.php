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
 * Time: 1:55 PM
 */

namespace App\Blueprint\Interfaces\Cart;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Interface CartInterface
 * @package App\Blueprint\Interfaces\Cart
 */
interface CartInterface
{
    /**
     * Login to cart
     *
     * @return mixed
     */
    function login();

    /**
     * Extract credentials from request to be used with blueprint auth system
     *
     * @param Request $request
     * @return mixed
     */
    function extractCredentials(Request $request);

    /**
     * @param Request|\Request $request
     * @return mixed
     */
    function setAuthCookie(Request $request);

    /**
     * Update user profile
     *
     * @param Request $request
     * @return mixed
     */
    function updateProfile(Request $request);

    /**
     * Change password
     *
     * @return mixed
     */
    function changePassword();

    /**
     * Add cart product
     *
     * @param Collection $data
     * @return mixed
     */
    function addProduct(Collection $data);
}

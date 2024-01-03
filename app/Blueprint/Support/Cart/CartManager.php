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
 * Time: 1:54 PM
 */

namespace App\Blueprint\Support\Cart;


use App\Blueprint\Interfaces\Cart\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\Middleware\StartSession;

/**
 * Class CartManager
 * @package App\Blueprint\Support\Cart
 */
class CartManager
{
    public $cart;

    /**
     * CartManager constructor.
     *
     * @param CartInterface $cart
     */
    function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Login to App from cart
     *
     * @param Request|\Request $request
     * @throws \Exception
     */
    function appLogin(Request $request)
    {
        /** @var StartSession $sessionMiddleware */
        $sessionMiddleware = app(StartSession::class);
        $response = $sessionMiddleware->handle($request, function ($request) {
            auth()->attempt($this->cart->extractCredentials($request));
            $this->cart->setAuthCookie($request);

            return new Response();
        });

        $sessionMiddleware->terminate($request, $response);
    }

    /**
     * Handle dynamic method calls into the cart.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->cart->$method(...$parameters);
    }
}

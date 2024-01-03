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
    public function getJsVars()
    {
        return [
            'sessionKey' => session('advFieldName'),
            'localApi' => route('local.api'),
            'cartAddRoute' => route('cart.add'),
            'cartSummary' => route('cart.summary'),
            'cartGetTotalRoute' => route('cart.getCartTotal'),
            'lang_you_have_added' => _t('register.you_have_added'),
            'lang_to_cart' => _t('register.to_cart'),
        ];
    }
}

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

namespace App\Components\Modules\CartTotal\AdministrationFee\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\PaymentTotal\AdministrationFee\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Register hooks
     *
     * @return Void
     */
    public function hooks()
    {
        $this->cartTotal();
    }
}

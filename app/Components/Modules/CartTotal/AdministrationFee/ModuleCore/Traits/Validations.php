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
 * Trait Validations
 * @package App\Components\Modules\CartTotal\AdministrationFee\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.amount' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.amount.required' => _mt($this->moduleId, 'RegistrationFee.Please_enter_registration_fee'),
            'module_data.amount.regex' => _mt($this->moduleId, 'RegistrationFee.Invalid_registration_fee'),
        ];
    }
}
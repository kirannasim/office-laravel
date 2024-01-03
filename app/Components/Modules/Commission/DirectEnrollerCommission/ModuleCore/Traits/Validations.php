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

namespace App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.registration.*' => 'required|numeric',
            'module_data.upgrade.*' => 'required|numeric',
            'module_data.wallet' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.registration.*.required' => _mt($this->moduleId, 'DirectEnrollerCommission.Please_enter_registration_amount'),
            'module_data.registration.*.numeric' => _mt($this->moduleId, 'DirectEnrollerCommission.Invalid_registration_amount'),
            'module_data.upgrade.*.required' => _mt($this->moduleId, 'DirectEnrollerCommission.Please_enter_registration_amount'),
            'module_data.upgrade.*.numeric' => _mt($this->moduleId, 'DirectEnrollerCommission.Invalid_registration_amount'),
            'module_data.wallet' => _mt($this->moduleId, 'DirectEnrollerCommission.Please_select_wallet'),
        ];
    }
}
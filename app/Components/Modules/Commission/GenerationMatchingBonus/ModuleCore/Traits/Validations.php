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

namespace App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.wallet' => 'required',
            'module_data.commission.*' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.wallet' => _mt($this->moduleId, 'GenerationMatchingBonus.Please_select_wallet'),
            'module_data.commission.*.required' => _mt($this->moduleId, 'GenerationMatchingBonus.Please_enter_commission_rate'),
            'module_data.commission.*.numeric' => _mt($this->moduleId, 'GenerationMatchingBonus.Invalid_commission_rate'),
        ];
    }
}
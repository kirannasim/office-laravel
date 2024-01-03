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

namespace App\Components\Modules\Commission\DiamondBonusPool\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\DiamondBonusPool\ModuleCore\Traits
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
            'module_data.pool_share.*' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.wallet' => _mt($this->moduleId, 'DiamondBonusPool.Please_select_wallet'),
            'module_data.pool_share.*' => _mt($this->moduleId, 'DiamondBonusPool.Please_enter_pool_share'),
        ];
    }
}
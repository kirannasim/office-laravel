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

namespace App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.distribution_type' => 'required',
            'module_data.pair_price' => 'required|numeric',
            'module_data.wallet' => 'required',
            'module_data.pair_ceiling_type' => 'required',
            'module_data.pair_ceiling_based' => 'required',
            'module_data.ceiling_rate.*' => 'required|numeric',
            'module_data.pair_value' => 'required_if:distribution_type,==,flat|numeric',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.distribution_type' => _mt($this->moduleId, 'TeamVolumeCommission.Please_choose_distribution_type'),
            'module_data.pair_price.required' => _mt($this->moduleId, 'TeamVolumeCommission.Please_enter_pair_price'),
            'module_data.pair_price.numeric' => _mt($this->moduleId, 'TeamVolumeCommission.Invalid_pair_price'),
            'module_data.wallet' => _mt($this->moduleId, 'TeamVolumeCommission.Please_select_wallet'),
            'module_data.pair_ceiling_type' => _mt($this->moduleId, 'TeamVolumeCommission.Please_pair_ceiling_type'),
            'module_data.pair_ceiling_based' => _mt($this->moduleId, 'TeamVolumeCommission.Please_select_pair_ceiling_based'),
            'module_data.ceiling_rate.*.required' => _mt($this->moduleId, 'TeamVolumeCommission.Please_enter_ceiling_rate'),
            'module_data.ceiling_rate.*.numeric' => _mt($this->moduleId, 'TeamVolumeCommission.Invalid_ceiling_rate'),
            'module_data.pair_value.required' => _mt($this->moduleId, 'TeamVolumeCommission.Please_enter_pair_value'),
            'module_data.pair_value.numeric' => _mt($this->moduleId, 'TeamVolumeCommission.Invalid_pair_value'),
        ];
    }
}
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

namespace App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.placement_based_on' => 'required',
            'module_data.upline_point_distribute' => 'required',
            'module_data.distribute_based_on' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.placement_based_on' => _mt($this->moduleId, 'Binary.Select_placement_type'),
            'module_data.upline_point_distribute' => _mt($this->moduleId, 'Binary.Select_point_distribute_status'),
            'module_data.distribute_based_on' => _mt($this->moduleId, 'Binary.Select_distribute_based_on'),
        ];
    }
}
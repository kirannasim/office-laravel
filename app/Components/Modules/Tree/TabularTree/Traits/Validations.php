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

namespace App\Components\Modules\Tree\TabularTree\Traits;

/**
 * Trait Validations
 * @package App\Components\Modules\Tree\TabularTree\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.view_tooltip' => 'required',
            'module_data.tooltip_info' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.view_tooltip.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_view_tooltip_option'),
            'module_data.tooltip_info.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_atleast_one'),
        ];
    }
}
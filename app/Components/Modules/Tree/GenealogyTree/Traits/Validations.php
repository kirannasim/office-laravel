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

namespace App\Components\Modules\Tree\GenealogyTree\Traits;

/**
 * Trait Validations
 * @package App\Components\Modules\Tree\GenealogyTree\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.tree_avatar' => 'required',
            'module_data.tree_zoom_in' => 'required',
            'module_data.tree_dragging' => 'required',
            'module_data.tree_animation' => 'required',
            'module_data.tree_registration' => 'required',
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
            'module_data.tree_avatar.required' => _mt($this->moduleId, 'GenealogyTree.Please_select_node_icon'),
            'module_data.tree_zoom_in.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_tree_zoom_in_option'),
            'module_data.tree_dragging.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_tree_dragging_option'),
            'module_data.tree_animation.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_tree_animation_option'),
            'module_data.tree_registration.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_tree_registration_option'),
            'module_data.view_tooltip.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_view_tooltip_option'),
            'module_data.tooltip_info.required' => _mt($this->moduleId, 'GenealogyTree.Please_set_atleast_one'),
        ];
    }
}
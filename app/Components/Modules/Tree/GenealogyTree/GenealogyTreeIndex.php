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

namespace App\Components\Modules\Tree\GenealogyTree;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\TreeModuleInterface;
use App\Components\Modules\Tree\GenealogyTree\Traits\Hooks;
use App\Components\Modules\Tree\GenealogyTree\Traits\Routes;
use App\Components\Modules\Tree\GenealogyTree\Traits\Validations;

/**
 * Class GenealogyTreeIndex
 * @package App\Components\Modules\Tree\GenealogyTree
 */
class GenealogyTreeIndex extends BasicContract implements TreeModuleInterface
{
    use Routes, Hooks, Validations;

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect([
            'tree_avatar' => 'default_icon',
            'tree_zoom_in' => 1,
            'tree_dragging' => 1,
            'tree_animation' => 1,
            'tree_registration' => 1,
            'view_tooltip' => 1,
            'tooltip_info' => [0 => 'firstname', 1 => 'lastname'
            ]]);

        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'moduleId' => $this->moduleId,
            'config' => $config,
        ];

        return view('Tree.GenealogyTree.Views.adminConfig', $data);
    }
}

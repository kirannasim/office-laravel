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

namespace App\Components\Modules\Tree\TabularTree;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Interfaces\Module\TreeModuleInterface;
use App\Components\Modules\Tree\TabularTree\Traits\Hooks;
use App\Components\Modules\Tree\TabularTree\Traits\Routes;
use App\Components\Modules\Tree\TabularTree\Traits\Validations;

/**
 * Class TabularTreeIndex
 * @package App\Components\Modules\Tree\TabularTreeIndex
 */
class TabularTreeIndex extends BasicContract implements TreeModuleInterface
{
    use Routes, Hooks, Validations;

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect(['view_tooltip' => 1, 'tooltip_info' => [0 => 'firstname', 1 => 'lastname']]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);
        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'moduleId' => $this->moduleId,
            'config' => $config,
        ];

        return view('Tree.TabularTree.Views.adminConfig', $data);
    }
}

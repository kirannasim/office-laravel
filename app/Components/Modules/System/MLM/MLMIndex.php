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

namespace App\Components\Modules\System\MLM;

use App\Blueprint\Interfaces\Core\SystemModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\System\MLM\ModuleCore\Traits\Hooks;


/**
 * Class MLMIndex
 * @package App\Components\Modules\System\MLM
 */
class MLMIndex extends BasicContract implements SystemModuleInterface
{
    use Hooks;
}
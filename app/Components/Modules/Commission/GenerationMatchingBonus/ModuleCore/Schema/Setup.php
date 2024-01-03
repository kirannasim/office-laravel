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

namespace App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Schema;

use App\Eloquents\TransactionOperation;

/**
 * Class Setup
 * @package App\Components\Modules\Commission\GenerationMatchingBonus\ModuleCore\Schema
 */
class Setup
{
    static function install()
    {
        if (!TransactionOperation::where('slug', '=', 'commission')->exists()) {
            TransactionOperation::insert(['slug' => 'commission', 'title' => 'Commission']);
        }
    }
}
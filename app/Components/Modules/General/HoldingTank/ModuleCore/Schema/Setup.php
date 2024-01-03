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

namespace App\Components\Modules\General\HoldingTank\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\HoldingTank\ModuleCore\Schema
 */
class Setup
{

    /**
     * Install employee module
     * @return void [type] [description]
     */

    static function install()
    {
        if (!Schema::hasTable('holding_tank'))
            Schema::create('holding_tank', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->boolean('status');
                $table->char('default_position');
                $table->timestamps();
                $table->softDeletes();
            });
    }

    /**
     * Uninstall employee module
     * @return [type] [description]
     */

    static function uninstall()
    {
        Schema::dropIfExists('holding_tank');
    }
}

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

namespace App\Components\Modules\General\MiniHoldingTank\ModuleCore\Schema;

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
        if (!Schema::hasTable('holding_users'))
            Schema::create('holding_users', function (Blueprint $table) {
                $table->increments('id');
                $table->char('username', 200);
                $table->char('email', 200);
                $table->longText('data');
                $table->boolean('status')->default(0);
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
        Schema::dropIfExists('holding_users');
    }
}

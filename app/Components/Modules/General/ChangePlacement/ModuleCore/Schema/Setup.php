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

namespace App\Components\Modules\General\ChangePlacement\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\ChangePlacement\ModuleCore\Schema
 */
class Setup
{

    /**
     * install change placement module
     * * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('change_placement_history')) {
            Schema::create('change_placement_history', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('from_parent', false, true);
                $table->integer('from_position', false, true);
                $table->integer('to_parent', false, true);
                $table->integer('to_position', false, true);
                $table->timestamps();
            });
        }

        /*Schema::table('change_placement_history', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('from_placement')
                ->references('id')->on('users');

            $table->foreign('to_placement')
                ->references('id')->on('users');
        });*/
    }

    /**
     * Uninstall change placement module
     * @return void [type] [description]
     */

    static function uninstall()
    {
        Schema::dropIfExists('change_placement_history');
    }
}

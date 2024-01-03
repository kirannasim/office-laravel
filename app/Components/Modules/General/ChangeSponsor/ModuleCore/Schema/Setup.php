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

namespace App\Components\Modules\General\ChangeSponsor\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\ChangeSponsor\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install Change sponsor module
     * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('change_sponsor_history')) {
            Schema::create('change_sponsor_history', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('from_sponsor', false, true);
                $table->integer('to_sponsor', false, true);
                $table->timestamps();
            });
        }

        Schema::table('change_sponsor_history', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('from_sponsor')
                ->references('id')->on('users');

            $table->foreign('to_sponsor')
                ->references('id')->on('users');
        });
    }

    /**
     * Uninstall Change sponsor module
     * @return void [type] [description]
     */

    static function uninstall()
    {
        Schema::dropIfExists('change_sponsor_history');
    }
}
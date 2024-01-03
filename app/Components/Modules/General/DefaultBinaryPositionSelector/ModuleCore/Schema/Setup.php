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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Schema;

use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector;
use App\Eloquents\UserRepo;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install Change sponsor module
     * @return void [type] [description]
     */
    static function install()
    {
        Schema::table('user_repo', function ($table) {
            Schema::table('user_repo', function (Blueprint $table) {
                $table->string('default_binary_position')->default(3);
            });

            UserRepo::where('user_id', 2)->update([
                'default_binary_position' => 3
            ]);
        });

        if (!Schema::hasTable('binary_position_selectors')) {
            Schema::create('binary_position_selectors', function (Blueprint $table) {
                $table->increments('id');
                $table->char('slug', 20);
                $table->char('title', 25);
            });

            BinaryPositionSelector::insert([
                ['slug' => 'default_left', 'title' => 'Default Left'],
                ['slug' => 'default_right', 'title' => 'Default Right'],
                ['slug' => 'alternate_left_right', 'title' => 'Alternate Left/Right'],
                ['slug' => 'weakest_leg', 'title' => 'Weakest Leg'],
            ]);
        }

        if (!Schema::hasTable('binary_position_selector_history')) {
            Schema::create('binary_position_selector_history', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('from_selector', false, true);
                $table->integer('to_selector', false, true);
                $table->timestamps();
            });
        }

        Schema::table('binary_position_selector_history', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('from_selector')
                ->references('id')->on('binary_position_selectors');

            $table->foreign('to_selector')
                ->references('id')->on('binary_position_selectors');
        });
    }

    /**
     * Uninstall Change sponsor module
     * @return void [type] [description]
     */

    static function uninstall()
    {
        Schema::dropIfExists('binary_position_selectors');
        Schema::dropIfExists('binary_position_selector_history');
    }
}
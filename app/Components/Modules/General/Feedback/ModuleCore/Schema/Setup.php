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

namespace App\Components\Modules\General\Feedback\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\Feedback\ModuleCore\Schema
 */
class Setup
{

    /**
     * Install employee module
     * @return void [type] [description]
     */

    static function install()
    {
        if (!Schema::hasTable('feedback_forms'))
            Schema::create('feedback_forms', function (Blueprint $table) {
                $table->increments('id');
                $table->char('name', 50)->nullable();
                $table->text('description')->nullable();
                $table->integer('status');
                $table->timestamps();
                $table->softDeletes();
            });

        if (!Schema::hasTable('feedback_options'))
            Schema::create('feedback_options', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('form_id');
                $table->text('feedback_option')->nullable();
                $table->integer('status');
                $table->timestamps();
                $table->softDeletes();
            });

        if (!Schema::hasTable('feedback_questions'))
            Schema::create('feedback_questions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('form_id');
                $table->text('question')->nullable();
                $table->integer('status');
                $table->timestamps();
                $table->softDeletes();
            });

        if (!Schema::hasTable('user_feedbacks'))
            Schema::create('user_feedbacks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('form_id');
                $table->text('options')->nullable();
                $table->integer('rating');
                $table->timestamps();
                $table->softDeletes();
            });

    }

    /**
     * Uninstall employee module
     * @return void [type] [description]
     */

    static function uninstall()
    {

        Schema::dropIfExists('feedback_forms');
        Schema::dropIfExists('feedback_options');
        Schema::dropIfExists('feedback_questions');
        Schema::dropIfExists('user_feedbacks');

    }
}

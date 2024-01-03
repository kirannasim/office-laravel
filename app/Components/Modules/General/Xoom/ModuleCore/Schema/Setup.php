<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Xoom\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\Xoom\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install news module
     * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('xoom_users'))
            Schema::create('xoom_users', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->unique();
                $table->unsignedBigInteger('xoom_user_id')->nullable();
                $table->text('access_token')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
            });
    }

    /**
     * Uninstall news module
     * @return void [type] [description]
     */
    static function uninstall()
    {
        Schema::dropIfExists('xoom_users');
    }
}

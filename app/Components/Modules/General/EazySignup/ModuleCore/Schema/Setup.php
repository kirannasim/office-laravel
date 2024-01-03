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

namespace App\Components\Modules\General\EazySignup\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\EazySignup\ModuleCore\Schema
 */
class Setup
{
    /**
     *
     */
    static function install()
    {
        if (!Schema::hasTable('easy_signup_history'))
            Schema::create('easy_signup_history', function (Blueprint $table) {
                $table->increments('id');
                $table->text('data')->nullable();
                $table->softdeletes();
                $table->timestamps();
            });

    }

    /**
     * Uninstall news module
     * @return void [type] [description]
     */
    static function uninstall()
    {
        Schema::dropIfExists('easy_signup_history');
    }
}

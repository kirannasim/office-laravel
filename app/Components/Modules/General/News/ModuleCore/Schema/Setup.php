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

namespace App\Components\Modules\General\News\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Setup
{

    /**
     * Install news module
     * @return [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('news'))
            Schema::create('news', function (Blueprint $table) {
                $table->increments('id');
                $table->char('title', 50)->nullable();
                $table->text('content')->nullable();
                $table->dateTime('dispatch_date')->nullable();
                $table->softdeletes();
                $table->timestamps();
            });
    }

    /**
     * Uninstall news module
     * @return [type] [description]
     */
    static function uninstall()
    {
        Schema::dropIfExists('news');
    }


}

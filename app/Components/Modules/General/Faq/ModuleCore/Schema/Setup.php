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

namespace App\Components\Modules\General\Faq\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\General\Faq\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install news module
     * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('faq_categories'))
            Schema::create('faq_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->char('title', 50)->nullable();
                $table->integer('sort_order')->nullable();
                $table->softdeletes();
                $table->timestamps();
            });

        if (!Schema::hasTable('faqs'))
            Schema::create('faqs', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('title')->nullable();
                $table->longText('content')->nullable();
                $table->integer('category')->nullable();
                $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('faq_categories');
        Schema::dropIfExists('faqs');
    }
}

<?php
/**
 * Copyright (c)
 * Hybrid MLM
 * @author HybridMLM
 * @link http://www.hybridmlmsoftware.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigFieldTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('config_field_tags')) {
            Schema::create('config_field_tags', function (Blueprint $table) {
                $table->increments('id');
                $table->text('title');
                $table->char('slug', 30);
                $table->text('description');
                $table->integer('editable');
                $table->integer('core');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_field_tags');
    }
}

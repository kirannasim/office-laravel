<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class ConfigFields
 */
class ConfigFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('config_fields')) return;

        Schema::create('config_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->char('field_type', 30);
            $table->char('link', 200);
            $table->char('field_name', 30);
            $table->text('placeholder');
            $table->text('label');
            $table->char('field_group', 30);
            $table->text('field_choices');
            $table->text('field_validation');
            $table->integer('sort_order');
            $table->text('conditional_rules');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_fields');
    }
}

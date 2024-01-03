<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class ConfigFieldGroups
 */
class ConfigFieldGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('config_field_groups')) return;
        Schema::create('config_field_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->nullable();
            $table->text('title');
            $table->char('slug', 50);
            $table->text('description');
            $table->char('iconFont', 50)->nullable();
            $table->char('image', 50)->nullable();
            $table->text('style')->nullable();
            $table->integer('tag_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('core');
            $table->boolean('editable');
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
        Schema::dropIfExists('config_field_groups');
    }
}

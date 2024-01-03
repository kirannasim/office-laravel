<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCustomFields
 */
class CreateCustomFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('custom_fields')) return;

        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->char('meta_key', 200);
            $table->text('meta_value');
            $table->char('group', 200);
            $table->integer('fieldable_id');
            $table->char('fieldable_type', 200);
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
        if (Schema::hasTable('custom_fields'))
            Schema::dropIfExists('custom_fields');
    }
}

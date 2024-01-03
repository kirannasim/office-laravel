<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateActivityTable
 */
class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('activities')) return;

        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->char('operation',50);
            $table->char('description',50);
            $table->integer('priority');
            $table->boolean('visibility')->default(0);
            $table->char('ip',255);
            $table->char('icon',255)->nullable();
            $table->char('color',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}

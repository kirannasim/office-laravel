<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cron_history')) return;

        Schema::create('cron_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cron_id');
            $table->longtext('response');
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
        if (!Schema::hasTable('cron_history')) return;

        Schema::dropIfExists('cron_history');
    }
}

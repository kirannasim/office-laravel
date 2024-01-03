<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cron_jobs')) return;

        Schema::create('cron_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('minute', 10);
            $table->char('hour', 10);
            $table->char('day', 10);
            $table->char('month', 10);
            $table->char('weekday', 10);
            $table->char('url', 200)->nullable();
            $table->char('task', 200)->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('cron_jobs')) return;

        Schema::dropIfExists('cron_jobs');
    }
}

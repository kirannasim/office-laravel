<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tasks')) return;

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('task_id');
            $table->char('name', 200);
            $table->text('description')->nullable();
            $table->text('failed')->nullable();
            $table->text('success')->nullable();
            $table->text('data')->nullable();
            $table->dateTime('started_at')->nullable();
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
        if (!Schema::hasTable('tasks')) return;

        Schema::dropIfExists('tasks');
    }
}

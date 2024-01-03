<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingDistributionList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pending_distribution_list'))
        {
            Schema::create('pending_distribution_list', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->char('scope',100);
                $table->integer('previous_package');
                $table->double('amount');
                $table->boolean('status');
                $table->datetime('deleted_at');
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
        Schema::dropIfExists('pending_distribution_list');
    }
}

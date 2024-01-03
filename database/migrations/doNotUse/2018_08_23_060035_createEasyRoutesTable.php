<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEasyRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('easy_routes'))
            Schema::create('easy_routes', function (Blueprint $table) {
                $table->increments('id');
                $table->char('route_name', 50)->nullable();
                $table->char('route_uri', 100);
                $table->char('route_controller', 100)->nullable();
                $table->char('title', 50)->nullable();
                $table->text('description')->nullable();
                $table->char('route_params', 50)->nullable();
                $table->softdeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('easy_routes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cities')) {
            Schema::create('cities', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->boolean('active')->default(true);
                $table->integer('state_id')->unsigned();
            });

            Schema::table('cities', function (Blueprint $table) {
                $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');            
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
        if(Schema::hasTable('cities')) {
            Schema::dropIfExists('cities');
        }
    }
}

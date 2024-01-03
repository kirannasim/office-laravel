<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateStatesTable
 */
class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('states')) return;

            Schema::create('states', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->boolean('active')->default(true);
                $table->integer('country_id')->unsigned();
            });

            Schema::table('states', function (Blueprint $table) {
                $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');            
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('states');
    }
}

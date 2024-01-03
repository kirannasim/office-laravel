<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTemporaryData
 */
class CreateTemporaryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_data', function (Blueprint $table) {
            $table->increments('id');
            $table->char('key', 250);
            $table->longText('value')->nullable();
            $table->boolean('status')->default(0);
            $table->string('context')->nullable(0);
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
        Schema::dropIfExists('temporary_data');
    }
}

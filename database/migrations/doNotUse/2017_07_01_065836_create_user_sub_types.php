<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUserSubTypes
 */
class CreateUserSubTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_sub_types')) return;

            Schema::create('user_sub_types', function (Blueprint $table) {
                $table->increments('id');
                $table->char('title',255);
                $table->integer('user_type_id')->unsigned();
                $table->longText('privilege')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('user_sub_types', function (Blueprint $table) {
                $table->foreign('user_type_id')
                ->references('id')->on('user_types')
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
        Schema::dropIfExists('user_sub_types');
    }
}

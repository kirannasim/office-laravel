<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_roles')) {
            Schema::create('user_roles', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('type_id')->default(0);
                $table->integer('sub_type_id')->default(1);
            });

            /*Schema::table('user_roles', function (Blueprint $table) {
                $table->foreign('user_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade');

                $table->foreign('type_id')
                        ->references('id')->on('user_types')
                        ->onDelete('cascade');

                $table->foreign('sub_type_id')
                        ->references('id')->on('user_sub_types')
                        ->onDelete('cascade');
            });*/
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}

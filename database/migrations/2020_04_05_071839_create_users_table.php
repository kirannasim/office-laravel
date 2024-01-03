<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) return;

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('status');
            $table->string('password');
            $table->string('phone');
            $table->boolean('new')
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

//            /*Schema::table('users', function (Blueprint $table) {
//                $table->foreign('status')
//                ->references('id')->on('user_status')
//                ->onDelete('cascade');
//            });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

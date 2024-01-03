<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRepoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_repo', function (Blueprint $table) {
            $table->integer('user_id')
            ->unique()
            ->unsigned();
            $table->integer('sponsor_id');
            $table->integer('parent_id')->default(0);
            $table->integer('LHS')->default(0);
            $table->integer('RHS')->default(0);
            $table->integer('SLHS')->default(0);
            $table->integer('SRHS')->default(0);
            $table->integer('position')->default(0);
            $table->integer('user_level')->default(0);
            $table->integer('sp_user_level')->default(0);
            $table->integer('status_id')->default(1);
            $table->integer('package_id');
            $table->softDeletes();
            $table->timestamps();
        });

        /*Schema::table('user_repo', function (Blueprint $table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');            
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_repo');
    }
}

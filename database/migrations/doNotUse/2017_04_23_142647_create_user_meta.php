<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_meta')) {
            Schema::create('user_meta', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')
                ->unique()
                ->unsigned();
                $table->string('firstname',50);
                $table->string('lastname',50);
                $table->date('dob',50)->default(Carbon::now());
                $table->string('address',200)->default(null);
                $table->integer('country_id')->default(0);
                $table->integer('state_id')->default(0);
                $table->integer('city_id')->default(0);
                $table->char('gender',1)->default(0);
                $table->bigInteger('pin')->default(0);
                $table->text('profile_pic')->nullable(0);
                $table->text('about_me')->nullable(0);
                $table->text('facebook')->nullable(0);
                $table->text('twitter')->nullable(0);
                $table->text('linked_in')->nullable(0);
                $table->text('google_plus')->nullable(0);
                $table->timestamps();
            });


            /*Schema::table('user_meta', function (Blueprint $table) {
                $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
                $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');
                $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
                $table->foreign('city_id')
                ->references('id')->on('cities')
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
        Schema::dropIfExists('user_meta');
    }
}

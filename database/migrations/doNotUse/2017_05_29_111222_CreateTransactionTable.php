<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTransactionTable
 */
class CreateTransactionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('transactions')) return;

        Schema::Create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payer')->unsigned();
            $table->integer('payee')->unsigned();
            $table->string('context');
            $table->integer('gateway');
            $table->double('amount');
            $table->double('actual_amount');
            $table->string('ip');
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('payer')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('payee')
                ->references('id')->on('users')
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
        Schema::dropIfExists('transactions');
    }

}

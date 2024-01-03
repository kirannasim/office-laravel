<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTransactionCharges
 */
class CreateTransactionCharges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('transaction_charges')) return;

        Schema::create('transaction_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('module_id');
            $table->double('amount');
            $table->boolean('is_credit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_charges');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('zota_transactions'))
        {
            Schema::create('zota_transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->char('address',200);
                $table->char('local_txn_id',200);
                $table->char('context',200);
                $table->char('callback',200);
                $table->integer('sort_order');
                $table->double('amount');
                $table->longText('data');
                $table->boolean('status');
                $table->timestamps();
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
        Schema::dropIfExists('zota_transactions');
    }
}

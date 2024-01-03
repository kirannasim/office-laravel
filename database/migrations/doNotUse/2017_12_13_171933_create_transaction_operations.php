<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTransactionOperations
 */
class CreateTransactionOperations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('transaction_operations')) return;

        Schema::create('transaction_operations', function (Blueprint $table) {
            $table->increments('id');
            $table->char('slug', 100);
            $table->char('title', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('transaction_operations'))
            Schema::dropIfExists('transaction_operations');
    }
}

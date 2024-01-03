<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAccounts
 */
class CreateAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('accounts')) return;

        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->boolean('is_credit');
            $table->text('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('accounts'))
            Schema::dropIfExists('accounts');
    }
}

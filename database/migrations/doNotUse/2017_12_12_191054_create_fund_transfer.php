<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFundTransfer
 */
class CreateFundTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('fund_transfer')) return;

        Schema::create('fund_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->text('remark');
            $table->integer('from_wallet');
            $table->integer('to_wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('fund_transfer')) Schema::dropIfExists('fund_transfer');
    }
}

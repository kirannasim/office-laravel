<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommissionTable
 */
class CreateCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('commissions'))
            Schema::create('commissions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('transaction_id');
                $table->integer('module_id');
                $table->integer('ref_user_id');
                $table->softdeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commissions');
    }
}

<?php

namespace App\Components\Modules\Payment\TransferWise\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\Payment\TransferWise\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install news module
     * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('transfer_transactions'))
            Schema::create('transfer_transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->char('reference', 200)->nullable();
                $table->char('local_txn_id', 200)->nullable();
                $table->char('context', 200)->nullable();
                $table->char('callback', 200)->nullable();
                $table->integer('sort_order')->nullable();
                $table->double('amount')->nullable();
                $table->longText('data')->nullable();
                $table->boolean('status')->default(0)->nullable();
                $table->timestamps();
            });

        if (!Schema::hasTable('transfer_history'))
            Schema::create('transfer_history', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('getParams')->nullable();
                $table->longText('postParams')->nullable();
                $table->timestamps();
            });

    }

    /**
     * Uninstall news module
     * @return void [type] [description]
     */
    static function uninstall()
    {
        Schema::dropIfExists('transfer_transactions');
        Schema::dropIfExists('transfer_history');
    }
}
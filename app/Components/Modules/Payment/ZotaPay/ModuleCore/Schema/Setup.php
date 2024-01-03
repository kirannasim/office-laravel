<?php

namespace App\Components\Modules\Payment\ZotaPay\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\Payment\ZotaPay\ModuleCore\Schema
 */
class Setup
{
    /**
     * Install news module
     * @return void [type] [description]
     */
    static function install()
    {
        if (!Schema::hasTable('Zota_transactions'))
            Schema::create('Zota_transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->char('address', 200)->nullable();
                $table->char('local_txn_id', 200)->nullable();
                $table->char('context', 200)->nullable();
                $table->char('callback', 200)->nullable();
                $table->integer('sort_order')->nullable();
                $table->double('amount')->nullable();
                $table->longText('data')->nullable();
                $table->boolean('status')->default(0)->nullable();
                $table->timestamps();
            });

        if (!Schema::hasTable('zota_history'))
            Schema::create('zota_history', function (Blueprint $table) {
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
        Schema::dropIfExists('zota_transactions');
        Schema::dropIfExists('zota_history');
    }
}
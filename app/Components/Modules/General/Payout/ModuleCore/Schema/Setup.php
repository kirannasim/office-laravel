<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Payout\ModuleCore\Schema;

use App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus;
use App\Eloquents\TransactionOperation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Setup
{
    static function install()
    {
        if (!Schema::hasTable('payouts')) {
            Schema::create('payouts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('transaction_id');
                $table->integer('wallet');
            });

            Schema::table('payouts', function (Blueprint $table) {
                $table->foreign('transaction_id')
                    ->references('transaction_id')->on('transactions')
                    ->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('payout_requests')) {
            Schema::create('payout_requests', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->double('request_amount');
                $table->double('release_amount');
                $table->integer('wallet');
                $table->integer('gateway');
                $table->text('remark');
                $table->integer('status');
                $table->integer('transaction_id');
                $table->integer('account');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('payout_status')) {
            Schema::create('payout_status', function (Blueprint $table) {
                $table->increments('id');
                $table->char('slug', 20);
                $table->char('title', 50);
            });

            PayoutStatus::insert([['slug' => 'pending', 'title' => 'Pending'], ['slug' => 'approved', 'title' => 'Approved'], ['slug' => 'rejected', 'title' => 'Rejected'], ['slug' => 'cancelled', 'title' => 'Cancelled']]);
        }

        if (!TransactionOperation::where('slug', 'payout')->exists())
            TransactionOperation::create([
                'title' => 'Payout',
                'slug' => 'payout'
            ]);

        Schema::table('payout_requests', function (Blueprint $table) {
            $table->foreign('status')
                ->references('id')->on('payout_status')
                ->onDelete('cascade');
        });
    }

    /**
     * Uninstall module
     */
    static function uninstall()
    {
        Schema::dropIfExists('payout');
        Schema::dropIfExists('payout_requests');
        Schema::dropIfExists('payout_status');
    }
}

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

namespace App\Components\Modules\Wallet\Ewallet\ModuleCore\Schema;

use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet;
use App\Eloquents\Activity;
use App\Eloquents\TransactionOperation;
use App\Eloquents\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\Wallet\Ewallet\ModuleCore\Schema
 */
class Setup
{
    static function install()
    {
        if (!Schema::hasTable('ewallet')) {
            Schema::create('ewallet', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->char('transaction_password', 200);
                $table->char('card_number', 50)->nullable();
                $table->char('cvv', 50)->nullable();
                $table->char('ip', 50)->nullable();
                $table->boolean('ip_status')->nullable();
                $table->boolean('status')->nullable();
                $table->timestamps();
            });

            Schema::table('ewallet', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            });

            /* add existing users to wallet */
            $users = User::orderBy('id')->get();
            foreach ($users as $user) {
                Ewallet::create([
                    'user_id' => $user->id,
                    'status' => 1
                ]);
            }
        }

        if (!TransactionOperation::where('slug', 'deposit')->exists())
            TransactionOperation::create([
                'title' => 'Deposit',
                'slug' => 'deposit'
            ]);

        if (!TransactionOperation::where('slug', 'deduct')->exists())
            TransactionOperation::create([
                'title' => 'Deduct',
                'slug' => 'deduct'
            ]);

        if (!TransactionOperation::where('slug', '=', 'fund_transfer')->exists())
            TransactionOperation::insert(['slug' => 'fund_transfer', 'title' => 'Fund transfer']);

        if (!Activity::where('operation', '=', 'fund_transfer')->exists())
            Activity::insert([
                'operation' => 'fund_transfer',
                'description' => 'Fund transfer',
                'priority' => 1,
                'visibility' => 1,
                'icon' => 'fa fa-google-wallet',
                'color' => 'orange',
            ]);
    }

    /**
     * Uninstall module
     */
    static function uninstall()
    {
        Schema::dropIfExists('ewallet');
    }
}
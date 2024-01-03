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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Schema;

use App\Eloquents\Activity;
use App\Eloquents\TransactionOperation;
use Exception;

/**
 * Class Setup
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Schema
 */
class Setup
{
    static function install()
    {
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
     * @throws Exception
     */
    static function uninstall()
    {
        TransactionOperation::whereIn('slug', ['deduct', 'deposit'])->delete();
    }

}
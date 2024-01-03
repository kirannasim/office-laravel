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

namespace App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Schema;

use App\Eloquents\TransactionOperation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Setup
 * @package App\Components\Modules\Commission\TeamVolumeCommission\ModuleCore\Schema
 */
class Setup
{
    static function install()
    {
        if (!Schema::hasTable('user_binary_points')) {
            Schema::create('binary_point_details', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->double('left_point');
                $table->double('right_point');
                $table->boolean('is_credit');
                $table->double('left_carry');
                $table->double('right_carry');
                $table->integer('pair')->nullable();
                $table->integer('possible_pair')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!TransactionOperation::where('slug', '=', 'commission')->exists())
            TransactionOperation::insert(['slug' => 'commission', 'title' => 'Commission']);
    }

    /**
     * Uninstall module
     */
    static function uninstall()
    {
        Schema::dropIfExists('user_binary_points');
    }
}
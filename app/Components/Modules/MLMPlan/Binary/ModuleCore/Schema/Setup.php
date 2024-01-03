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

namespace App\Components\Modules\MLMPlan\Binary\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Class Setup
 * @package App\Components\Modules\MLMPlan\Binary\ModuleCore\Schema
 */
class Setup
{
    /**
     *
     */
    static function install()
    {
        if (!Schema::hasTable('binary_points'))
            Schema::create('binary_points', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->double('point');
                $table->boolean('position');
                $table->boolean('is_credit');
                $table->double('pair');
                $table->double('possible_pair');
                $table->integer('from_user')->nullable();
                $table->char('context', 20)->nullable();
                $table->softdeletes();
                $table->timestamps();
            });
    }


    /**
     *
     */
    static function uninstall()
    {
        Schema::dropIfExists('binary_points');
    }
}

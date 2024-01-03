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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Class Setup
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Schema
 */
class Setup
{
    /**
     * install
     */
    static function install()
    {
        if (!Schema::hasTable('advanced_rank_benefits')) {
            Schema::create('advanced_rank_benefits', function (Blueprint $table) {
                $table->increments('id');
                $table->char('name', 100);
                $table->double('value')->default(0);
                $table->text('description')->nullable();
                $table->char('image', 200)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('advanced_ranks')) {
            Schema::create('advanced_ranks', function (Blueprint $table) {
                $table->increments('id');
                $table->char('name', 50);
                $table->char('image', 200)->nullable();
                $table->integer('referral_count', false, true)->nullable();
                $table->integer('referral_rank', false)->nullable();
                $table->integer('referral_rank_count', false)->nullable();
                $table->boolean('is_active');
                $table->integer('benefit', false, true)->nullable();
                $table->integer('accumulated_cycle')->default(0);
                $table->integer('accumulated_cycle_preceding')->default(0);
                $table->boolean('need_active_referrals')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('advanced_rank_users')) {
            Schema::create('advanced_rank_users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('rank_id', false, true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('advanced_rank_achievement_history')) {
            Schema::create('advanced_rank_achievement_history', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('rank_id', false, true);
                $table->dateTime('date');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('advanced_rank_personalize')) {
            Schema::create('advanced_rank_personalize', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('rank_id', false, true);
            });
        }

        if (!Schema::hasTable('advanced_rank_personalize_history')) {
            Schema::create('advanced_rank_personalize_history', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);
                $table->integer('rank_id', false, true);
                $table->timestamps();
            });
        }
    }

    /**
     *
     */
    static function uninstall()
    {
        Schema::dropIfExists('advanced_rank_benefits');
        Schema::dropIfExists('advanced_ranks');
        Schema::dropIfExists('advanced_rank_users');
        Schema::dropIfExists('advanced_rank_achievement_history');
        Schema::dropIfExists('advanced_rank_personalize');
        Schema::dropIfExists('advanced_rank_personalize_history');
    }
}

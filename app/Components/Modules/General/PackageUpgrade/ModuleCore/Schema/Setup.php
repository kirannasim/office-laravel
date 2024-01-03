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

namespace App\Components\Modules\General\PackageUpgrade\ModuleCore\Schema;

use App\Eloquents\ConfigField;
use App\Eloquents\TransactionOperation;
use Illuminate\Support\Facades\DB;

class Setup
{
    /**
     * install
     */
    static function install()
    {
        DB::table('config_fields')->insert([
            [
                "field_type" => "multiSelect",
                "field_name" => "package_upgrade",
                "placeholder" => '{"en":null,"es":null}',
                "label" => "{\"en\":\"Package Upgrade\",\"es\":\"Package Upgrade\"}",
                "field_group" => 9,
                "field_choices" => "{\"choice_type\":\"module\",\"custom_choice\":[{\"label\":{\"en\":null,\"es\":null},\"value\":null}],\"pool\":\"Payment\"}",
                "field_validation" => "[\"required\"]", "sort_order" => 3, "conditional_rules" => ""]
        ]);
        TransactionOperation::create(['title' => 'Package Upgrade', 'slug' => 'package_upgrade']);
    }

    /**
     * Uninstall module
     */
    static function uninstall()
    {
        ConfigField::where('field_name', 'package_upgrade')->delete();
        TransactionOperation::where('slug', 'package_upgrade')->delete();
    }
}
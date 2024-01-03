<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                "name" => "Advanced Privileges",
                "slug" => 'Security-AdvancedPrivileges',
                "installed" => 1,
                "active" => 1
            ]
        ]);
    }
}

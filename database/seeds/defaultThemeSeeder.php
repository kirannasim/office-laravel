<?php

use Illuminate\Database\Seeder;

/**
 * Class defaultThemeSeeder
 */
class defaultThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            [ "title" => "Base theme", "slug" => "Base",'layout' => 'darkblue', 'installed' =>1,'active' =>1],
        ]);
    }
}

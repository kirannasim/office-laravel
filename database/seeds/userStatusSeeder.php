<?php

use Illuminate\Database\Seeder;

/**
 * Class userStatusSeeder
 */
class userStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->insert([
            [ "title" => "active", "description" => "Represents active user"],
            [ "title" => "inactive", "description" => "Represents inactive user"],
            [ "title" => "terminated", "description" => "Represents terminated user"]
        ]);
    }
}

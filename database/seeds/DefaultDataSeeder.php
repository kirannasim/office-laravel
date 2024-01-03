<?php

use Illuminate\Database\Seeder;

/**
 * Class DefaultDataSeeder
 */
class DefaultDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('users')->insert([
            ["username" => "company", "email" => "company@email.com", "password" => bcrypt('admin'), "phone" => 123456789]
        ]);
        
        DB::table('user_meta')->insert([
            ["user_id" => 1, "firstname" => "company", "lastname" => 'company', "dob" => '2017-05-10', "address" => 'admin', "address" => 'admin', "country_id" => 101, "state_id" => 19, "city_id" => 1892, "gender" => 'M',"pin" => 56465]
        ]);
        
        DB::table('user_repo')->insert([

            ["user_id" => 1, "Sponsor_id" =>0, "parent_id" =>0, "LHS" => 0, "RHS" => 0, "SLHS" => 0, "SRHS" => 0, "position" =>0]
        ]);

        DB::table('user_roles')->insert([

            ["user_id" => 1, "type_id" =>1, "sub_type_id" =>1]
        ]);


        DB::table('users')->insert([

            ["username" => "admin", "email" => "admin@email.com", "password" => bcrypt('admin'), "phone" => 123456789]
        ]);

        DB::table('user_meta')->insert([

            ["user_id" => 2, "firstname" => "admin", "lastname" => 'admin', "dob" => '2017-05-10', "address" => 'admin', "address" => 'admin', "country_id" => 101, "state_id" => 19, "city_id" => 1892, "gender" => 'M',"pin" => 56465]
        ]);

        DB::table('user_repo')->insert([

            ["user_id" => 2, "Sponsor_id" =>0, "parent_id" =>0, "LHS" => 1, "RHS" => 2, "SLHS" => 1, "SRHS" => 2, "position" =>0]
        ]);

        DB::table('user_roles')->insert([

            ["user_id" => 2, "type_id" =>2, "sub_type_id" =>2]
        ]);


        DB::table('config')->insert([

            ["meta_key" => "company_name", "meta_value" => "getoncode", "group" =>'company', "status" =>1,'serialized'=>0],
            ["meta_key" => "company_address", "meta_value" => "getoncode", "group" =>'company', "status" =>1,'serialized'=>0],
            ["meta_key" => "welcome_email", "meta_value" => "getoncode", "group" =>'email', "status" =>1,'serialized'=>0]
        ]);

        DB::table('bookmark_types')->insert([

            ["label" => '{"en":"Left Menu"}', "slug" => "leftMenu", "description" => 'Left Menu', "view_component" => 'Misc.Bookmarks.components.menu', 'icon_font'=> 'fa-bars', 'icon_image'=> null, 'sort_order'=> 1],
        ]);
        
    }
}

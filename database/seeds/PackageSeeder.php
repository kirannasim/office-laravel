<?php

use Illuminate\Database\Seeder;

/**
 * Class PackageSeeder
 */
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [];

    	for($i = 1; $i <= 4; $i++){

    		$packages[]  = [
    			"name" => "Package$i", 
    			"price" => $i * 100, 
    			"pv" => $i * 50, 
    			"description" => "Package $i",
    			"image" => env('APP_URL') . "/../public/photos/shares/package$i.png",
    			"created_at" => date('Y-m-d H:i:s'),
    			"updated_at" => date('Y-m-d H:i:s'),
    		];
    	}

        DB::table('packages')->insert($packages);
    }
}

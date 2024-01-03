<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultDataSeeder::class);

        $this->call(CountryTableSeeder::class);

        $this->call(StateTableSeeder::class);

        $this->call(CityTableSeeder::class);

        $this->call(PackageSeeder::class);

        $this->call(defaultThemeSeeder::class);

        $this->call(configsSeeder::class);

        $this->call(UserTypeSeeder::class);

        $this->call(TransactionSeeder::class);

        $this->call(ActivitySeeder::class);

        //$this->call(CurrencySeeder::class);

        $this->call(MenuSeeder::class);

        $this->call(EasyRouteSeeder::class);

        $this->call(ModuleSeeder::class);

        $this->call(XoomSeeder::class);
    }
}

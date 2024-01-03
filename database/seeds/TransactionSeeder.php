<?php

use Illuminate\Database\Seeder;

/**
 * Class TransactionSeeder
 */
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_operations')->insert([
            [ "slug" => "registration", "title" => "Registration"],
            [ "slug" => "payout", "title" => "Payout"],
        ]);
    }
}

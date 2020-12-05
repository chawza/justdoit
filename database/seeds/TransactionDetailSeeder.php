<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transaction_detail')->insert([
            [
                'transaction_id' => 1,
                'shoe_id' => 3,
                'price' => DB::table('shoes')->find(3)->price,
                'num_items' => 3,
            ],
            [
                'transaction_id' => 1,
                'shoe_id' => 5,
                'price' => DB::table('shoes')->find(5)->price,
                'num_items' => 1,
            ],
            [
                'transaction_id' => 2,
                'shoe_id' => 2,
                'price' => DB::table('shoes')->find(2)->price,
                'num_items' => 1,
            ],
            [
                'transaction_id' => 3,
                'shoe_id' => 4,
                'price' => DB::table('shoes')->find(4)->price,
                'num_items' => 2,
            ],
        ]);
    }
}

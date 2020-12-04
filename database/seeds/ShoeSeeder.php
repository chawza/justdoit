<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shoes')->insert([
            [
                'name' => 'Alphaedge 4D Reflective Shoes',
                'price' => 4700000,
                'quantity' => 5,
                'description' => 'LIGHTWEIGHT RUNNING SHOES DESIGNED TO GIVE ATHLETES AN EDGE.',
                'thumbnail' => 'FV4686_SLC_eCom.jpg',
            ],
            [
                'name' => 'Crazy BYW Pharrell Williams Shoes',
                'price' => 3000000,
                'quantity' => 5,
                'description' => "OFF-COURT BASKETBALL SHOES ROOTED IN THE '90S.",
                'thumbnail' => 'FV7333_SMC_eCom.jpg',
            ],
            [
                'name' => 'Ultraboost 20 Shoes',
                'price' => 3000000,
                'quantity' => 10,
                'description' => 'ADAPTIVE RUNNING SHOES WITH STITCHED-IN MIDFOOT SUPPORT.',
                'thumbnail' => 'FX8895_SMC_eCom.jpg',
            ],
            [
                'name' => 'NIKE Downshifter 9 Sepatu Running',
                'price' => 2000000,
                'quantity' => 3,
                'description' => 'LIGHTWEIGHT RUNNING SHOES DESIGNED TO GIVE ATHLETES AN EDGE.',
                'thumbnail' => 'nike_nike_downshifter_9_aq7481-005_sepatu_running_pria_full05.webp',
            ],
            [
                'name' => 'NIKE Off White X Nike Air Max 90 Sepatu',
                'price' => 14000000,
                'quantity' => 2,
                'description' => ' sneakers shoes berbahan leather, suede, dan mesh yang didesain trendy dengan detail neat stitching, eyelets, dan outsole berkualitas, sehingga nyaman saat digunakan.',
                'thumbnail' => 'nike_nike-off-white-x-nike-air-max-90-sepatu-sneaker-pria---black_full06.webp',
            ]
        ]);
    }
}

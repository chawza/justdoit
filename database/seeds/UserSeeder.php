<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Bobby',
                'role' => 'member',
                'email' => 'asd@asd.com',
                'password' => Hash::make('asdasd123'),
            ],
            [
                'name' => 'Sarah',
                'role' => 'member',
                'email' => 'asdasd@asd.com',
                'password' => Hash::make('asdasd123'),
            ],
            [
                'name' => 'admin1',
                'role' => 'admin',
                'email' => 'asd@admin.com',
                'password' => Hash::make('asdasd123'),
            ],
        ]);
    }
}

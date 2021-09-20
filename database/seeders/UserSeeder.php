<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'phone' => '998912228887',
            'password' => 'user1pass',
        ]);

        DB::table('users')->insert([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'phone' => '998912228886',
            'password' => 'user2pass',
        ]);
    }
}

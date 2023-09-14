<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'user_01',
            'email' => 'user_01@gmail.com',
            'password' => Hash::make('111111'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'user_02',
            'email' => 'user_02@gmail.com',
            'password' => Hash::make('222222'),
        ]);
    }
}
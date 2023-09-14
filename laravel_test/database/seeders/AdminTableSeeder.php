<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
            'name' => 'alan_admin',
            'email'    => 'sotobtw@gmail.com',
            'password' => Hash::make('alanso9321'),
        ]);
    }
}
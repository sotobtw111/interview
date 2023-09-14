<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPermissonTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_permissions')->delete();

        DB::table('user_permissions')->insert([
            'id' => 1,
            'user_id' => '1',
            'auth_name' => "edit",
        ]);
    }
}
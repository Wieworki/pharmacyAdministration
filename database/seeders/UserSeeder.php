<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Adds admin user
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nombre' => "admin",
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'role_id' => 1
            ]
        ]);
    }
}

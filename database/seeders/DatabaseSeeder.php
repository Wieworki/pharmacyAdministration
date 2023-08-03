<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AfiliadoSeeder;
use Database\Seeders\SexoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Use command // php artisan db:seed // to execute the seeder
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AfiliadoSeeder::class);
        $this->call(SexoSeeder::class);
    }
}

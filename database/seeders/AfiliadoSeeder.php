<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AfiliadoSeeder extends Seeder
{
    protected Faker $fakerFactory;

    function __construct() {
        $this->fakerFactory = new Faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->fakerFactory->create();
        for($i = 0; $i < 10; $i++) {
            DB::table('afiliados')->insert([
                [
                    'nombre' => $faker->name(),
                    'apellido' => $faker->lastName(),
                    'fecha_nacimiento' => $faker->date(),
                    'dni' => $faker->numerify('########')
                ]
            ]);
        }
    }
}

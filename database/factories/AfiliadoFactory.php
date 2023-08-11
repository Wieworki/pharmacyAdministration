<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Afiliado>
 */
class AfiliadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'apellido' => fake()->lastName(),
            'sexo_id' => fake()->randomElement([1,2,3]),
            'fecha_nacimiento' => fake()->date(),
            'observaciones' => '',
            'dni' => fake()->numerify('########')
        ];
    }
}

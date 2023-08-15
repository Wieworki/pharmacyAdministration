<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicamento>
 */
class MedicamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_id' => 0,
            'principio_activo_id' => 0,
            'laboratorio_id' => 0,
            'marca' => 'marca ' . fake()->name(),
            'presentacion' => 'presentacion ' . fake()->name()
        ];
    }
}

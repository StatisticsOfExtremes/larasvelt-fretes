<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'placa' => fake()->text(6),
            'antt' => fake()->text(10),
            'nome_dono'=>fake()->name(),
            'identificacao_dono'=>fake()->text(10)
        ];
    }
}

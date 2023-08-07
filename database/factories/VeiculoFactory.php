<?php

namespace Database\Factories;

use App\Models\Veiculo;
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
        $tipo = fake()->randomElement(['cavalo', 'carreta', 'truck', '3/4', 'toco', 'furgao'])
        return [
            'placa' => fake()->text(6),
            'antt' => fake()->text(10),
            'nome_dono' => fake()->name(),
            'tipo' => $tipo,
            'identificacao_dono' => fake()->numerify('#############'),
            'carreta_associada' => function (array $attributes) {
                if ($attributes['tipo'] === 'cavalo') {
                    return Veiculo::factory()->create()->id;
                }
                return null;
            }
        ];
    }
}

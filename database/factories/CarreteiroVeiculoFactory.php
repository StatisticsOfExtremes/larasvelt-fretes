<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Carreteiro;
use App\Models\Veiculo;
use App\Models\CarreteiroVeiculo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarreteiroVeiculo>
 */
class CarreteiroVeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'veiculo_id' => Veiculo::factory(),
            'carreteiro_id' => Carreteiro::factory(),
            'ativo' => faker()->boolean() 
        ];
    }
}

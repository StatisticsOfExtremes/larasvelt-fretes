<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carreteiro;
use App\Models\Veiculo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carreteiro>
 */
class CarreteiroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'telefone' => $this->faker->numerify('###########'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Carreteiro $carreteiro) {
            $veiculos = Veiculo::factory()->count(2)->create();
            foreach ($veiculos as $veiculo) {
                $ativo = $this->faker->boolean();
                $carreteiro->veiculos()->attach($carreteiro->id,['ativo' => $ativo]);
            }
        });
    }
}

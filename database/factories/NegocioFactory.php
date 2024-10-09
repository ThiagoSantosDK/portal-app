<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\TipoNegocio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $latlong =
        $this->faker->latitude().','.
        $this->faker->longitude();
        return [
            //
            'nome_fantasia' => $this->faker->name,
            'descricao' => $this->faker->text,
            'contato' => $this->faker->phoneNumber,
            'latitude_longitude' => $latlong,
            'ativo' => $this->faker->boolean,
            'id_tipo_negocio' => TipoNegocio::pluck('id')->random(),
            'id_endereco' => Endereco::pluck('id')->random()
        ];
    }
}

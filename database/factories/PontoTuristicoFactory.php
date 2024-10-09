<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\TipoPontoTuristico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PontoTuristico>
 */
class PontoTuristicoFactory extends Factory
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
            'nome' => $this->faker->name,
            'contato' => $this->faker->phoneNumber,
            'latitude_longitude' => $latlong,
            'descricao' => $this->faker->text,
            'como_chegar' => $this->faker->text,
            'imagem' => $this->faker->imageUrl(),
            'id_endereco' => Endereco::pluck('id')->random(), 
            'id_tipo_ponto_turistico' => TipoPontoTuristico::pluck('id')->random()
        ];
    }
}

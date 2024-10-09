<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Caderno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'data' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'titulo' => $this->faker->sentence,
            'subtitulo' => $this->faker->sentence,
            'texto' => $this->faker->text,
            'id_autor' => Autor::pluck('id')->random(),
            'id_caderno' => Caderno::pluck('id')->random()
        ];
    }
}

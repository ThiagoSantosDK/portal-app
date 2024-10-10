<?php

namespace Database\Seeders;

use App\Models\TipoPontoTuristico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPontoTuristicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoPontoTuristico::factory(10)->create();
    }
}

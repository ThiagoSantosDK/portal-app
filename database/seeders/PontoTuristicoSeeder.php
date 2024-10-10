<?php

namespace Database\Seeders;

use App\Models\PontoTuristico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PontoTuristicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PontoTuristico::factory(20)->create();
    }
}

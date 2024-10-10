<?php

namespace Database\Seeders;

use App\Models\TipoNegocio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoNegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoNegocio::factory(10)->create();
    }
}

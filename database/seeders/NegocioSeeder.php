<?php

namespace Database\Seeders;

use App\Models\Negocio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Negocio::factory(50)->create();
    }
}

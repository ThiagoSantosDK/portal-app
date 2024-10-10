<?php

namespace Database\Seeders;

use App\Models\Caderno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadernoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Caderno::factory(10)->create();
    }
}

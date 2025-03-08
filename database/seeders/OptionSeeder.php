<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se crean opciones asociadas a las respuestas con ID 1 y 2.
        Option::create([
            'answer_id' => 1
        ]);

        Option::create([
            'answer_id' => 2
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se asume que existen preguntas con ID 1 y 2.
        Answer::create([
            'question_id' => 1,
            'value'       => 'Muy bueno'
        ]);

        Answer::create([
            'question_id' => 2,
            'value'       => 'Regular'
        ]);
    }
}

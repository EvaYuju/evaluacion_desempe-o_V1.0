<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Para simplificar, se asume que Survey con ID=1, Category con ID=1 y Scale con ID=1 existen.
         Question::create([
            'survey_id'   => 1,
            'question'    => '¿Cómo calificarías tu desempeño en el último proyecto?',
            'category_id' => 1,
            'scale_id'    => 1
        ]);

        Question::create([
            'survey_id'   => 1,
            'question'    => '¿Cómo evalúas la comunicación en el equipo?',
            'category_id' => 2,
            'scale_id'    => 2
        ]);
    }
}

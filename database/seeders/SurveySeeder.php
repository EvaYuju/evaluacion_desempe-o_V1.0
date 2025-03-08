<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Survey;

class SurveySeeder extends Seeder
{
    public function run()
    {
        Survey::create([
            'title' => 'Encuesta Inicial', 
            'description' => 'Evaluación de desempeño'
        ]);
    }
}

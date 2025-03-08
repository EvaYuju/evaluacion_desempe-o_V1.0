<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title'       => 'Competencia A',
            'description' => 'Descripción de la competencia A'
        ]);

        Category::create([
            'title'       => 'Competencia B',
            'description' => 'Descripción de la competencia B'
        ]);
    }
}

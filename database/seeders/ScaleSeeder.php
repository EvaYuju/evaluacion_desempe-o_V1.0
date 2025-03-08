<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scale;

class ScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scale::create([
            'title'  => 'Bajo',
            'value'  => 1,
            'points' => 1
        ]);

        Scale::create([
            'title'  => 'Medio',
            'value'  => 2,
            'points' => 2
        ]);

        Scale::create([
            'title'  => 'Alto',
            'value'  => 3,
            'points' => 3
        ]);
    }
}

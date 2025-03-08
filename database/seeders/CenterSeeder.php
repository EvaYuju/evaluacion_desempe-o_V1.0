<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Center;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Centros de prueba
        Center::create([
            'denomination' => 'Centro A', 
            'province' => 'Madrid']);
        Center::create([
            'denomination' => 'Centro B',
            'province' => 'Barcelona'
        ]);

    }
}

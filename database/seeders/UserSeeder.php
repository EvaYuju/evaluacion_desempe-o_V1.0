<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Center;
use Illuminate\Support\Facades\Hash; // Para encriptar la contraseña


class UserSeeder extends Seeder
{
    public function run()
    {
        // Obtenemos el primer centro para asociarlo en una variable
        $center = Center::first();
        User::create([
            'name'      => 'SuperAdmin',
            'email'     => 'superadmin@example.com',
            'nif'       => '00000000S',
            'sex'       => 'M',
            'center_id' => $center->id,
            'role'      => 'super_admin',
            'password'  => Hash::make('123456') 
        ]);
    
        // Admin
        User::create([
            'name'      => 'Admin Empresa',
            'email'     => 'admin@example.com',
            'nif'       => '11111111A',
            'sex'       => 'F',
            'center_id' => $center->id,
            'role'      => 'admin',
            'password'  => Hash::make('123456') 
        ]);
    
        // User
        User::create([
            'name'      => 'Empleado Uno',
            'email'     => 'empleado1@example.com',
            'nif'       => '22222222B',
            'sex'       => 'M',
            'center_id' => $center->id,
            'role'      => 'user',
            'password'  => Hash::make('123456') 
        ]);
    }
}

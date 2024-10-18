<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => 'Juanjog11',
            'name' => 'Juan José Gallego Neira',
            'password' => Hash::make('password123'),
            'phone_number' => '1234567890',
            'id_number' => '123456789',
            'email' => 'gallego@gmail.com',
            'id_role' => 1,
            'id_parking_lot' => 1,
        ]);

        User::create([
            'user_name' => 'Pepito10',
            'name' => 'Pedro Andres Orjuela Marin',
            'password' => Hash::make('password123'),
            'phone_number' => '1234567890',
            'id_number' => '123456789',
            'email' => 'pedro@gmail.com',
            'id_role' => 2,
            'id_parking_lot' => 2,
        ]);

        User::create([
            'user_name' => 'Andres13',
            'name' => 'Andres Manuel Duarte Arias',
            'password' => Hash::make('password123'),
            'phone_number' => '1234567890',
            'id_number' => '123456789',
            'email' => 'andres@gmail.com',
            'id_role' => 2,
            'id_parking_lot' => 2,
        ]);


    }
}

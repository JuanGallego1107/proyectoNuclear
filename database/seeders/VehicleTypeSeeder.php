<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create([
            'name' => 'Carro'
        ]);

        VehicleType::create([
            'name' => 'Moto'
        ]);

        VehicleType::create([
            'name' => 'Buseta'
        ]);

        VehicleType::create([
            'name' => 'Van'
        ]);
    }
}
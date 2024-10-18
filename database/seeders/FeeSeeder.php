<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fee::create([
            'name' => 'Carro Hora',
            'cost' => 2000,
            'id_vehicle_type' => 1,
            'id_parking_lot' => 1,
        ]);

        Fee::create([
            'name' => 'Carro Dia',
            'cost' => 10000,
            'id_vehicle_type' => 1,
            'id_parking_lot' => 1,
        ]);

        Fee::create([
            'name' => 'Carro Mes',
            'cost' => 70000,
            'id_vehicle_type' => 1,
            'id_parking_lot' => 1,
        ]);

        Fee::create([
            'name' => 'Moto hora',
            'cost' => 1000,
            'id_vehicle_type' => 2,
            'id_parking_lot' => 1,
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\AdditionalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdditionalService::create([
            'name' => 'Lavada',
            'cost' => '70000',
            'id_parking_lot' => 1,
        ]);

        AdditionalService::create([
            'name' => 'Lavada moto',
            'cost' => '40000',
            'id_parking_lot' => 2,
        ]);

        AdditionalService::create([
            'name' => 'Cambio de aceite',
            'cost' => '80000',
            'id_parking_lot' => 1,
        ]);

        AdditionalService::create([
            'name' => 'Revisión tecnico-mecánica',
            'cost' => '2500000',
            'id_parking_lot' => 2,
        ]);
    }
}

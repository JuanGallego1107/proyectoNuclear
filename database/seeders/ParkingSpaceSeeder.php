<?php

namespace Database\Seeders;

use App\Models\ParkingSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkingSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParkingSpace::create([
            'space_number' => '101',
            'id_parking_lot' => 1,
        ]);

        ParkingSpace::create([
            'space_number' => '102',
            'id_parking_lot' => 1,
        ]);

        ParkingSpace::create([
            'space_number' => '103',
            'id_parking_lot' => 1,
        ]);

        ParkingSpace::create([
            'space_number' => '104',
            'id_parking_lot' => 1,
        ]);

    }
}

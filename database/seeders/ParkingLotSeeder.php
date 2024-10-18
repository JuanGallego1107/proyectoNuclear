<?php

namespace Database\Seeders;

use App\Models\ParkingLot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // List of 3 parking lots registers for testing
             
                $parking = new ParkingLot();
                $parking->name = 'Parqueadero Central';
                $parking->address = 'Calle 1 #23-45, Armenia, Quindío';
                $parking->phone_number = '3216549870';
                $parking->nit = '900123456-7';
                $parking->coord_x = '4.533889'; 
                $parking->coord_y = '-75.681389';
                $parking->save();
        
                $parking = new ParkingLot();
                $parking->name = 'Parqueadero La 14';
                $parking->address = 'Carrera 14 #15-32, Armenia, Quindío';
                $parking->phone_number = '3129876543';
                $parking->nit = '900765432-1';
                $parking->coord_x = '4.534444';
                $parking->coord_y = '-75.676667';
                $parking->save();
        
                $parking = new ParkingLot();
                $parking->name = 'Parqueadero San José';
                $parking->address = 'Calle 2 #12-30, Armenia, Quindío';
                $parking->phone_number = '3101234567';
                $parking->nit = '900345678-9';
                $parking->coord_x = '4.536111';
                $parking->coord_y = '-75.673333';
                $parking->save();
    }
}

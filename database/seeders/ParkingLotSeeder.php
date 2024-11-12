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

        // List of 20 parking lots for testing
        $parkingLots = [
            [
                'name' => 'Parqueadero Central',
                'address' => 'Calle 1 #23-45, Armenia, Quindío',
                'phone_number' => '3216549870',
                'nit' => '900123456-7',
                'coord_x' => '4.533889',
                'coord_y' => '-75.681389',
            ],
            [
                'name' => 'Parqueadero La 14',
                'address' => 'Carrera 14 #15-32, Armenia, Quindío',
                'phone_number' => '3129876543',
                'nit' => '900765432-1',
                'coord_x' => '4.534444',
                'coord_y' => '-75.676667',
            ],
            [
                'name' => 'Parqueadero San José',
                'address' => 'Calle 2 #12-30, Armenia, Quindío',
                'phone_number' => '3101234567',
                'nit' => '900345678-9',
                'coord_x' => '4.536111',
                'coord_y' => '-75.673333',
            ],
            [
                'name' => 'Parqueadero El Bosque',
                'address' => 'Calle 5 #10-25, Armenia, Quindío',
                'phone_number' => '3104567890',
                'nit' => '900567890-2',
                'coord_x' => '4.537890',
                'coord_y' => '-75.678900',
            ],
            [
                'name' => 'Parqueadero Los Andes',
                'address' => 'Carrera 20 #8-50, Armenia, Quindío',
                'phone_number' => '3134567890',
                'nit' => '900123789-4',
                'coord_x' => '4.539100',
                'coord_y' => '-75.682300',
            ],
            [
                'name' => 'Parqueadero Nuevo Milenio',
                'address' => 'Carrera 12 #25-19, Armenia, Quindío',
                'phone_number' => '3156789012',
                'nit' => '900432123-6',
                'coord_x' => '4.535678',
                'coord_y' => '-75.677890',
            ],
            [
                'name' => 'Parqueadero La Estación',
                'address' => 'Calle 8 #16-34, Armenia, Quindío',
                'phone_number' => '3121239876',
                'nit' => '900567321-9',
                'coord_x' => '4.540000',
                'coord_y' => '-75.670123',
            ],
            [
                'name' => 'Parqueadero Los Robles',
                'address' => 'Carrera 15 #17-45, Armenia, Quindío',
                'phone_number' => '3174561234',
                'nit' => '900987654-3',
                'coord_x' => '4.532345',
                'coord_y' => '-75.679456',
            ],
            [
                'name' => 'Parqueadero El Dorado',
                'address' => 'Calle 3 #20-15, Armenia, Quindío',
                'phone_number' => '3145678910',
                'nit' => '900876543-1',
                'coord_x' => '4.538123',
                'coord_y' => '-75.675890',
            ],
            [
                'name' => 'Parqueadero Las Palmas',
                'address' => 'Avenida Bolívar #30-55, Armenia, Quindío',
                'phone_number' => '3116547890',
                'nit' => '900654321-0',
                'coord_x' => '4.531234',
                'coord_y' => '-75.674567',
            ],
            [
                'name' => 'Parqueadero San Miguel',
                'address' => 'Calle 10 #5-15, Armenia, Quindío',
                'phone_number' => '3154321098',
                'nit' => '901234567-8',
                'coord_x' => '4.542345',
                'coord_y' => '-75.680012',
            ],
            [
                'name' => 'Parqueadero Plaza Mayor',
                'address' => 'Carrera 9 #14-20, Armenia, Quindío',
                'phone_number' => '3187654321',
                'nit' => '900998877-6',
                'coord_x' => '4.543211',
                'coord_y' => '-75.671234',
            ],
            [
                'name' => 'Parqueadero Colón',
                'address' => 'Avenida 19 #2-15, Armenia, Quindío',
                'phone_number' => '3209876543',
                'nit' => '900765123-4',
                'coord_x' => '4.541123',
                'coord_y' => '-75.672345',
            ],
            [
                'name' => 'Parqueadero Bella Vista',
                'address' => 'Calle 11 #4-10, Armenia, Quindío',
                'phone_number' => '3112345678',
                'nit' => '900345612-0',
                'coord_x' => '4.544500',
                'coord_y' => '-75.678999',
            ],
            [
                'name' => 'Parqueadero Los Pinos',
                'address' => 'Carrera 18 #7-25, Armenia, Quindío',
                'phone_number' => '3198765432',
                'nit' => '900512345-8',
                'coord_x' => '4.545678',
                'coord_y' => '-75.670123',
            ],
            [
                'name' => 'Parqueadero Centro Norte',
                'address' => 'Calle 6 #3-12, Armenia, Quindío',
                'phone_number' => '3134569876',
                'nit' => '900678912-3',
                'coord_x' => '4.546789',
                'coord_y' => '-75.678111',
            ],
            [
                'name' => 'Parqueadero El Parque',
                'address' => 'Carrera 21 #10-19, Armenia, Quindío',
                'phone_number' => '3176543210',
                'nit' => '900123654-7',
                'coord_x' => '4.547890',
                'coord_y' => '-75.679999',
            ],
            [
                'name' => 'Parqueadero La Esquina',
                'address' => 'Calle 7 #8-14, Armenia, Quindío',
                'phone_number' => '3109876543',
                'nit' => '900912345-0',
                'coord_x' => '4.548123',
                'coord_y' => '-75.671000',
            ],
            [
                'name' => 'Parqueadero Las Flores',
                'address' => 'Avenida Bolívar #40-25, Armenia, Quindío',
                'phone_number' => '3191234567',
                'nit' => '900654789-1',
                'coord_x' => '4.549000',
                'coord_y' => '-75.672500',
            ],
            [
                'name' => 'Parqueadero Los Naranjos',
                'address' => 'Carrera 11 #15-11, Armenia, Quindío',
                'phone_number' => '3115671234',
                'nit' => '900123987-6',
                'coord_x' => '4.550111',
                'coord_y' => '-75.676700',
            ]
        ];

        foreach ($parkingLots as $data) {
            $parking = new ParkingLot();
            $parking->name = $data['name'];
            $parking->address = $data['address'];
            $parking->phone_number = $data['phone_number'];
            $parking->nit = $data['nit'];
            $parking->coord_x = $data['coord_x'];
            $parking->coord_y = $data['coord_y'];
            $parking->save();
        }
    }
}

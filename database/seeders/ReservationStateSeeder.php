<?php

namespace Database\Seeders;

use App\Models\ReservationState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationState::create([
            'name' => 'Pendiente',
        ]);

        ReservationState::create([
            'name' => 'Aceptada',
        ]);

        ReservationState::create([
            'name' => 'Cancelada',
        ]);

        ReservationState::create([
            'name' => 'Pagada',
        ]);
    }
}

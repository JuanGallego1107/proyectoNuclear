<?php

namespace Database\Seeders;

use App\Models\WeekDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WeekDay::create([
            'day_number' => '1',
            'name' => 'Lunes',
        ]);

        WeekDay::create([
            'day_number' => '2',
            'name' => 'Martes',
        ]);

        WeekDay::create([
            'day_number' => '3',
            'name' => 'Miercoles',
        ]);

        WeekDay::create([
            'day_number' => '4',
            'name' => 'Jueves',
        ]);

        WeekDay::create([
            'day_number' => '5',
            'name' => 'Viernes',
        ]);

        WeekDay::create([
            'day_number' => '6',
            'name' => 'Sábado',
        ]);

        WeekDay::create([
            'day_number' => '7',
            'name' => 'Domingo',
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'start_time' => '08:00:00', 
            'end_time' => '18:00:00',   
        ]);

        Schedule::create([
            'start_time' => '06:00:00',
            'end_time' => '20:00:00',  
        ]);

        Schedule::create([
            'start_time' => '08:00:00',
            'end_time' => '1:00:00',
        ]);

        Schedule::create([
            'start_time' => '10:00:00',
            'end_time' => '20:00:00',
        ]);
    }
}

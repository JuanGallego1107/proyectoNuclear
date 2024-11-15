<?php

namespace Database\Seeders;

use App\Models\DaySchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DaySchedule::create([
            'id_week_day' => 1,
            'id_schedule' => 1,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 2,
            'id_schedule' => 1,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 3,
            'id_schedule' => 1,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 4,
            'id_schedule' => 1,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 5,
            'id_schedule' => 1,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 6,
            'id_schedule' => 3,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 7,
            'id_schedule' => 2,
            'id_parking_lot' => 1,
        ]);

        DaySchedule::create([
            'id_week_day' => 1,
            'id_schedule' => 1,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 2,
            'id_schedule' => 1,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 3,
            'id_schedule' => 1,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 4,
            'id_schedule' => 1,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 5,
            'id_schedule' => 1,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 6,
            'id_schedule' => 3,
            'id_parking_lot' => 2,
        ]);

        DaySchedule::create([
            'id_week_day' => 7,
            'id_schedule' => 2,
            'id_parking_lot' => 2,
        ]);
    }
}

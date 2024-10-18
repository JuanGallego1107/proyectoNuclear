<?php

namespace App\Repositories;

use App\Interfaces\DayScheduleRepositoryInterface;
use App\Models\DaySchedule;
use Illuminate\Support\Facades\DB;

class DayScheduleRepository implements DayScheduleRepositoryInterface
{
    public function getAllDaySchedules()
    {
        return DaySchedule::with(['weekDay', 'schedule', 'parkingLot'])->get();
    }

    public function createDaySchedule(array $data)
    {
        return DaySchedule::create([
            'id_week_day' => $data['id_week_day'],
            'id_schedule' => $data['id_schedule'],
            'id_parking_lot' => $data['id_parking_lot'],
        ]);
    }

    public function updateDaySchedule(array $data)
    {
        DB::update('
            UPDATE day_schedules
            SET id_schedule = ?
            WHERE id_week_day = ?
            AND id_parking_lot = ?',
            [
                $data['id_schedule'],
                $data['id_week_day'],
                $data['id_parking_lot'],
            ]
        );
    }
}

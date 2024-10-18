<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function getAllSchedules()
    {
        return Schedule::get();
    }

    public function createSchedule(array $data)
    {
        return Schedule::create([
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }

    public function getScheduleById(int $id)
    {
        return Schedule::findOrFail($id);
    }

    public function updateSchedule(array $data, int $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);

        return $schedule;
    }

    public function deleteSchedule(int $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
    }
}

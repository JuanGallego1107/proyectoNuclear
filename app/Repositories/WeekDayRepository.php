<?php

namespace App\Repositories;

use App\Interfaces\WeekDayRepositoryInterface;
use App\Models\WeekDay;

class WeekDayRepository implements WeekDayRepositoryInterface
{
    public function getAllWeekDays()
    {
        return WeekDay::all();
    }

    public function createWeekDay(array $data)
    {
        return WeekDay::create([
            'day_number' => $data['day_number'],
            'name' => $data['name'],
        ]);
    }

    public function getWeekDayById(int $id)
    {
        return WeekDay::findOrFail($id);
    }
}

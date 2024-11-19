<?php

namespace App\Interfaces;

interface WeekDayRepositoryInterface
{
    /**
     * Retrieve all weekdays.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllWeekDays();

    /**
     * Create a new weekday record.
     *
     * @param array $data
     * @return \App\Models\WeekDay
     */
    public function createWeekDay(array $data);

    /**
     * Retrieve a specific weekday by its ID.
     *
     * @param int $id
     * @return \App\Models\WeekDay
     */
    public function getWeekDayById(int $id);
}

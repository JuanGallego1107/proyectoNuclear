<?php

namespace App\Interfaces;

interface DayScheduleRepositoryInterface
{
    /**
     * Retrieve a list of all day schedules with related week days, schedules, and parking lots.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllDaySchedules();

    /**
     * Create a new day schedule record.
     *
     * @param array $data
     * @return \App\Models\DaySchedule
     */
    public function createDaySchedule(array $data);

    /**
     * Update the schedule for a specific week day and parking lot.
     *
     * @param array $data
     * @return void
     */
    public function updateDaySchedule(array $data);
}

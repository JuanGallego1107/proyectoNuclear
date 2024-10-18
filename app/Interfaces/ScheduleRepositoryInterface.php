<?php

namespace App\Interfaces;

interface ScheduleRepositoryInterface
{
    /**
     * Retrieve all schedules from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllSchedules();

    /**
     * Create a new schedule record.
     *
     * @param array $data
     * @return \App\Models\Schedule
     */
    public function createSchedule(array $data);

    /**
     * Retrieve a specific schedule by its ID.
     *
     * @param int $id
     * @return \App\Models\Schedule
     */
    public function getScheduleById(int $id);

    /**
     * Update an existing schedule record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Schedule
     */
    public function updateSchedule(array $data, int $id);

    /**
     * Delete a schedule by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteSchedule(int $id);
}

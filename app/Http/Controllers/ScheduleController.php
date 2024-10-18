<?php

namespace App\Http\Controllers;

use App\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $scheduleRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display a listing of the schedules.
     *
     * Retrieves all schedules from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hours = $this->scheduleRepository->getAllSchedules();
        return response()->json($hours);
    }

    /**
     * Store a newly created schedule in storage.
     *
     * Validates the request and creates a new schedule record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $this->scheduleRepository->createSchedule($request->all());
    }

    /**
     * Display the specified schedule.
     *
     * Retrieves a specific schedule by its ID.
     *
     * @param int $id The ID of the schedule to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $hour = $this->scheduleRepository->getScheduleById($id);
        return response()->json($hour);
    }

    /**
     * Update the specified schedule in storage.
     *
     * Validates the request and updates the schedule record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the schedule to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' =>  'required',
        ]);

        $this->scheduleRepository->updateSchedule($request->all(), $id);
    }

    /**
     * Remove the specified schedule from storage.
     *
     * Deletes the specified schedule by its ID.
     *
     * @param int $id The ID of the schedule to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->scheduleRepository->deleteSchedule($id);
    }
}

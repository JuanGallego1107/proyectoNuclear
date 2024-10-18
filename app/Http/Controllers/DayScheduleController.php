<?php

namespace App\Http\Controllers;

use App\Interfaces\DayScheduleRepositoryInterface;
use Illuminate\Http\Request;

class DayScheduleController extends Controller
{
    protected $dayScheduleRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param DayScheduleRepositoryInterface $dayScheduleRepository
     */
    public function __construct(DayScheduleRepositoryInterface $dayScheduleRepository)
    {
        $this->dayScheduleRepository = $dayScheduleRepository;
    }

    /**
     * Display a listing of the day schedules.
     *
     * Retrieves a list of day schedules with related week days, schedules, and parking lots.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $schedules = $this->dayScheduleRepository->getAllDaySchedules();
        return response()->json($schedules);
    }

    /**
     * Store a newly created day schedule in storage.
     *
     * Validates and creates a new day schedule record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_week_day' => 'required',
            'id_schedule' => 'required',
            'id_parking_lot' => 'required',
        ]);

        $this->dayScheduleRepository->createDaySchedule($request->all());
    }

    /**
     * Update a day schedule based on week day and parking lot.
     *
     * Validates the request data and updates the schedule for a specific week day and parking lot.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function updateScheduleDay(Request $request)
    {
        $request->validate([
            'id_week_day' => 'required|integer',
            'id_parking_lot' => 'required|integer',
            'id_schedule' => 'required|integer',
        ]);

        $this->dayScheduleRepository->updateDaySchedule($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Interfaces\WeekDayRepositoryInterface;
use Illuminate\Http\Request;

class WeekDayController extends Controller
{
    protected $weekDayRepository;

    /**
     * Constructor para inyectar el repositorio.
     *
     * @param WeekDayRepositoryInterface $weekDayRepository
     */
    public function __construct(WeekDayRepositoryInterface $weekDayRepository)
    {
        $this->weekDayRepository = $weekDayRepository;
    }

    /**
     * Display a listing of the weekdays.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $days = $this->weekDayRepository->getAllWeekDays();
        return response()->json($days);
    }

    /**
     * Store a newly created weekday in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'day_number' => 'required',
            'name' => 'required',
        ]);

        $this->weekDayRepository->createWeekDay($request->all());
    }

    /**
     * Display the specified weekday.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $day = $this->weekDayRepository->getWeekDayById($id);
        return response()->json($day);
    }

    /**
     * Update the specified weekday in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'day_number' => 'required',
            'name' => 'required',
        ]);

        $this->weekDayRepository->updateWeekDay($request->all(), $id);
    }

    /**
     * Remove the specified weekday from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        $this->weekDayRepository->deleteWeekDay($id);
    }
}

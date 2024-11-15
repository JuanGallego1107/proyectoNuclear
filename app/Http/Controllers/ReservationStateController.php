<?php

namespace App\Http\Controllers;

use App\Interfaces\ReservationStateRepositoryInterface;
use App\Models\ReservationState;
use Illuminate\Http\Request;

class ReservationStateController extends Controller
{
    protected $reservationStateRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param ReservationStateRepositoryInterface $reservationStateRepository
     */
    public function __construct(ReservationStateRepositoryInterface $reservationStateRepository)
    {
        $this->reservationStateRepository = $reservationStateRepository;
    }

    /**
     * Display a listing of the reservation states.
     *
     * Retrieves all reservation states from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $states = $this->reservationStateRepository->getAllReservationStates();
        return response()->json($states);
    }

    /**
     * Store a newly created reservation state in storage.
     *
     * Validates the request and creates a new reservation state record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->reservationStateRepository->createReservationState($request->all());
    }

    /**
     * Display the specified reservation state.
     *
     * Retrieves a specific reservation state by its ID.
     *
     * @param int $id The ID of the reservation state to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $state = $this->reservationStateRepository->getReservationStateById($id);
        return response()->json($state);
    }

    /**
     * Update the specified reservation state in storage.
     *
     * Validates the request and updates the reservation state record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the reservation state to update.
     * @return ReservationState
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return $this->reservationStateRepository->updateReservationState($request->all(), $id);
    }

    /**
     * Remove the specified reservation state from storage.
     *
     * Deletes the specified reservation state by its ID.
     *
     * @param int $id The ID of the reservation state to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->reservationStateRepository->deleteReservationState($id);
    }
}

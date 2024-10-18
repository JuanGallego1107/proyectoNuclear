<?php

namespace App\Http\Controllers;

use App\Interfaces\ParkingSpaceRepositoryInterface;
use Illuminate\Http\Request;

class ParkingSpaceController extends Controller
{
    protected $parkingSpaceRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param ParkingSpaceRepositoryInterface $parkingSpaceRepository
     */
    public function __construct(ParkingSpaceRepositoryInterface $parkingSpaceRepository)
    {
        $this->parkingSpaceRepository = $parkingSpaceRepository;
    }

    /**
     * Display a listing of the parking spaces.
     *
     * Retrieves all parking spaces with their associated parking lots, ordered by ID in descending order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $spaces = $this->parkingSpaceRepository->getAllParkingSpaces();
        return response()->json($spaces);
    }

    /**
     * Store a newly created parking space in storage.
     *
     * Validates the request and creates a new parking space record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'space_number' => 'required',
            'id_parking_lot' => 'required',
        ]);

        $this->parkingSpaceRepository->createParkingSpace($request->all());
    }

    /**
     * Display the specified parking space.
     *
     * Retrieves a specific parking space by its ID along with its associated parking lot.
     *
     * @param int $id The ID of the parking space to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $space = $this->parkingSpaceRepository->getParkingSpaceById($id);
        return response()->json($space);
    }

    /**
     * Update the specified parking space in storage.
     *
     * Validates the request and updates the parking space record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the parking space to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'space_number' => 'required',
        ]);

        $this->parkingSpaceRepository->updateParkingSpace($request->all(), $id);
    }

    /**
     * Remove the specified parking space from storage.
     *
     * Deletes the specified parking space by its ID.
     *
     * @param int $id The ID of the parking space to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->parkingSpaceRepository->deleteParkingSpace($id);
    }
}

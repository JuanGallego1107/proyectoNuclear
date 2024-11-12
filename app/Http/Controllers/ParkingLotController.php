<?php

namespace App\Http\Controllers;

use App\Interfaces\ParkingLotRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParkingLotController extends Controller
{
    protected $parkingLotRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param ParkingLotRepositoryInterface $parkingLotRepository
     */
    public function __construct(ParkingLotRepositoryInterface $parkingLotRepository)
    {
        $this->parkingLotRepository = $parkingLotRepository;
    }

    /**
     * Display a listing of the parking lots.
     *
     * Retrieves a list of all parking lots, ordered by their ID in descending order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $parkingList = $this->parkingLotRepository->getAllParkingLots();
        return response()->json($parkingList);
    }

    /**
     * Store a newly created parking lot in storage.
     *
     * Validates the request and creates a new parking lot record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
            'address' => 'required',
            'phone_number' => 'required',
            'nit' => ['required', Rule::unique('parking_lots', 'nit')],
            'coord_x' => 'required',
            'coord_y' => 'required',
        ]);

        $parkingLot = $this->parkingLotRepository->createParkingLot($request->all());

        return response()->json($parkingLot);
    }

    /**
     * Display the specified parking lot.
     *
     * Retrieves and returns a specific parking lot by its ID.
     *
     * @param int $id The ID of the parking lot to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $parking = $this->parkingLotRepository->getParkingLotById($id);
        return response()->json($parking);
    }

    /**
     * Update the specified parking lot in storage.
     *
     * Validates the request and updates the existing parking lot record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the parking lot to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' =>  ['required'],
            'address' => 'required',
            'phone_number' => 'required',
            'nit' => ['required', Rule::unique('parking_lots')->ignore($id)],
            'coord_x' => 'required',
            'coord_y' => 'required',
        ]);

        $updatedParking = $this->parkingLotRepository->updateParkingLot($request->all(), $id);

        return response()->json($updatedParking);
    }

    /**
     * Remove the specified parking lot from storage.
     *
     * Deletes the specified parking lot by its ID.
     *
     * @param int $id The ID of the parking lot to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->parkingLotRepository->deleteParkingLot($id);
    }
}

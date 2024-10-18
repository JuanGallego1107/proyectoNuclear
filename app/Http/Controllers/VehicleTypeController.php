<?php

namespace App\Http\Controllers;

use App\Interfaces\VehicleTypeRepositoryInterface;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    protected $vehicleTypeRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param VehicleTypeRepositoryInterface $vehicleTypeRepository
     */
    public function __construct(VehicleTypeRepositoryInterface $vehicleTypeRepository)
    {
        $this->vehicleTypeRepository = $vehicleTypeRepository;
    }

    /**
     * Display a listing of the vehicle types.
     *
     * Retrieves all vehicle types from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vehicles = $this->vehicleTypeRepository->getAllVehicleTypes();
        return response()->json($vehicles);
    }

    /**
     * Store a newly created vehicle type in storage.
     *
     * Validates the request data and creates a new vehicle type record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->vehicleTypeRepository->createVehicleType($request->all());
    }

    /**
     * Display the specified vehicle type.
     *
     * Retrieves a vehicle type by its ID.
     *
     * @param int $id The ID of the vehicle type to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $vehicle = $this->vehicleTypeRepository->getVehicleTypeById($id);
        return response()->json($vehicle);
    }

    /**
     * Update the specified vehicle type in storage.
     *
     * Validates the request data and updates the vehicle type record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the vehicle type to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->vehicleTypeRepository->updateVehicleType($request->all(), $id);
    }

    /**
     * Remove the specified vehicle type from storage.
     *
     * Deletes the vehicle type by its ID.
     *
     * @param int $id The ID of the vehicle type to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->vehicleTypeRepository->deleteVehicleType($id);
    }
}

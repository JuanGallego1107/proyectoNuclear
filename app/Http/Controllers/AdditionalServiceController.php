<?php

namespace App\Http\Controllers;

use App\Interfaces\AdditionalServiceRepositoryInterface;
use App\Models\AdditionalService;
use Illuminate\Http\Request;

class AdditionalServiceController extends Controller
{
    protected $additionalServiceRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param AdditionalServiceRepositoryInterface $additionalServiceRepository
     */
    public function __construct(AdditionalServiceRepositoryInterface $additionalServiceRepository)
    {
        $this->additionalServiceRepository = $additionalServiceRepository;
    }

    /**
     * Display a listing of additional services.
     *
     * Retrieves a list of additional services, including related parking lots,
     * ordered by the most recent first.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $services = $this->additionalServiceRepository->getAllAdditionalServices();
        return response()->json($services);
    }

    /**
     * Store a newly created additional service in storage.
     *
     * Validates and creates a new additional service record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'id_parking_lot' => 'required',
        ]);

        $this->additionalServiceRepository->createAdditionalService($request->all());
    }

    /**
     * Display the specified additional service.
     *
     * Retrieves and returns a specific additional service by its ID, 
     * including the related parking lot.
     *
     * @param int $id The ID of the additional service to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $service = $this->additionalServiceRepository->getAdditionalServiceById($id);
        return response()->json($service);
    }

    /**
     * Update the specified additional service in storage.
     *
     * Validates and updates an existing additional service record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the additional service to update.
     * @return AdditionalService
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'cost' => 'required',
        ]);

        return $this->additionalServiceRepository->updateAdditionalService($id, $request->all());
    }

    /**
     * Remove the specified additional service from storage.
     *
     * Deletes the specified additional service by its ID.
     *
     * @param int $id The ID of the additional service to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->additionalServiceRepository->deleteAdditionalService($id);
    }

    /**
     * Display a listing of the additional services
     *
     * Retrieves all aditional services with their associated parking lots,
     * ordered by ID in descending order.
     *
     * @param int $parkingLotId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdditionalServicesByParkingId(int $parkingLotId)
    {
        $spaces = $this->additionalServiceRepository->getAdditionalServicesByParkingId($parkingLotId);
        return response()->json($spaces);
    }
}

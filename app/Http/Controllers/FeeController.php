<?php

namespace App\Http\Controllers;

use App\Interfaces\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $feeRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param FeeRepositoryInterface $feeRepository
     */
    public function __construct(FeeRepositoryInterface $feeRepository)
    {
        $this->feeRepository = $feeRepository;
    }

    /**
     * Display a listing of the fees.
     *
     * Retrieves a list of all fees, including the related vehicle types and parking lots,
     * ordered by the most recent first.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $fees = $this->feeRepository->getAllFees();
        return response()->json($fees);
    }

    /**
     * Store a newly created fee in storage.
     *
     * Validates the request and creates a new fee record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'cost' => 'required',
            'id_vehicle_type' => 'required',
            'id_parking_lot' => 'required',
        ]);

        $this->feeRepository->createFee($request->all());
    }

    /**
     * Display the specified fee.
     *
     * Retrieves and returns a specific fee by its ID, including related vehicle types and parking lots.
     *
     * @param int $id The ID of the fee to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $fee = $this->feeRepository->getFeeById($id);
        return response()->json($fee);
    }

    /**
     * Update the specified fee in storage.
     *
     * Validates the request and updates the existing fee record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the fee to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' =>  'required',
            'cost' => 'required',
            'id_vehicle_type' => 'required',
        ]);

        $this->feeRepository->updateFee($request->all(), $id);
    }

    /**
     * Remove the specified fee from storage.
     *
     * Deletes the specified fee by its ID.
     *
     * @param int $id The ID of the fee to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->feeRepository->deleteFee($id);
    }
}

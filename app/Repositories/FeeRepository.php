<?php

namespace App\Repositories;

use App\Interfaces\FeeRepositoryInterface;
use App\Models\Fee;

class FeeRepository implements FeeRepositoryInterface
{
    public function getAllFees()
    {
        return Fee::with(['vehicleType', 'parkingLot'])->orderByDesc('id')->get();
    }

    public function createFee(array $data)
    {
        return Fee::create([
            'name' => $data['name'],
            'cost' => $data['cost'],
            'id_vehicle_type' => $data['id_vehicle_type'],
            'id_parking_lot' => $data['id_parking_lot'],
        ]);
    }

    public function getFeeById(int $id)
    {
        return Fee::with(['vehicleType', 'parkingLot'])->findOrFail($id);
    }

    public function updateFee(array $data, int $id)
    {
        $fee = Fee::findOrFail($id);

        $fee->update([
            'name' => $data['name'],
            'cost' => $data['cost'],
            'id_vehicle_type' => $data['id_vehicle_type'],
        ]);

        return $fee;
    }

    public function deleteFee(int $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();
    }

    public function getFeesByParkingId(int $id){

        return Fee::with(['vehicleType','parkingLot'])
        ->where('id_parking_lot', $id)
        ->orderByDesc('id')
        ->get();
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\ParkingSpaceRepositoryInterface;
use App\Models\ParkingSpace;

class ParkingSpaceRepository implements ParkingSpaceRepositoryInterface
{
    public function getAllParkingSpaces()
    {
        return ParkingSpace::with(['parkingLot'])
            ->orderByDesc('id')
            ->get();
    }

    public function createParkingSpace(array $data)
    {
        return ParkingSpace::create([
            'space_number' => $data['space_number'],
            'id_parking_lot' => $data['id_parking_lot'],
        ]);
    }

    public function getParkingSpaceById(int $id)
    {
        return ParkingSpace::with(['parkingLot'])->findOrFail($id);
    }

    public function updateParkingSpace(array $data, int $id)
    {
        $space = ParkingSpace::findOrFail($id);

        $space->update([
            'space_number' => $data['space_number'],
        ]);

        return $space;
    }

    public function deleteParkingSpace(int $id)
    {
        $space = ParkingSpace::findOrFail($id);
        $space->delete();
    }

    public function getParkingSpacesByParkingId(int $id){

        return ParkingSpace::with(['parkingLot'])
        ->where('id_parking_lot', $id)
        ->orderByDesc('id')
        ->get();
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\ParkingLotRepositoryInterface;
use App\Models\ParkingLot;

class ParkingLotRepository implements ParkingLotRepositoryInterface
{
    public function getAllParkingLots()
{
    return ParkingLot::with([
        'daySchedule.weekDay',
        'daySchedule.schedule'
    ])
    ->orderByDesc('id')
    ->get();
}

    public function createParkingLot(array $data)
    {
        return ParkingLot::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'nit' => $data['nit'],
            'coord_x' => $data['coord_x'],
            'coord_y' => $data['coord_y'],
        ]);
    }

    public function getParkingLotById(int $id)
    {
        return ParkingLot::with(['daySchedule.weekDay', 'daySchedule.schedule', 'parkingSpace', 'fee', 'additionService'])
            ->findOrFail($id);
    }
    

    public function updateParkingLot(array $data, int $id)
    {
        $parking = ParkingLot::findOrFail($id);

        $parking->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'nit' => $data['nit'],
            'coord_x' => $data['coord_x'],
            'coord_y' => $data['coord_y'],
        ]);

        return $parking;
    }

    public function deleteParkingLot(int $id)
    {
        $parking = ParkingLot::findOrFail($id);
        $parking->delete();
    }
}

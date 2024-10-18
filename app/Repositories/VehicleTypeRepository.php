<?php

namespace App\Repositories;

use App\Interfaces\VehicleTypeRepositoryInterface;
use App\Models\VehicleType;

class VehicleTypeRepository implements VehicleTypeRepositoryInterface
{
    public function getAllVehicleTypes()
    {
        return VehicleType::all();
    }

    public function createVehicleType(array $data)
    {
        return VehicleType::create([
            'name' => $data['name'],
        ]);
    }

    public function getVehicleTypeById(int $id)
    {
        return VehicleType::findOrFail($id);
    }

    public function updateVehicleType(array $data, int $id)
    {
        $vehicle = VehicleType::findOrFail($id);
        $vehicle->update([
            'name' => $data['name'],
        ]);

        return $vehicle;
    }

    public function deleteVehicleType(int $id)
    {
        $vehicle = VehicleType::findOrFail($id);
        $vehicle->delete();
    }
}

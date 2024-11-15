<?php

namespace App\Repositories;

use App\Interfaces\AdditionalServiceRepositoryInterface;
use App\Models\AdditionalService;

class AdditionalServiceRepository implements AdditionalServiceRepositoryInterface
{
    public function getAllAdditionalServices()
    {
        return AdditionalService::with('parkingLot')->orderByDesc('id')->get();
    }

    public function createAdditionalService(array $data)
    {
        return AdditionalService::create([
            'name' => $data['name'],
            'cost' => $data['cost'],
            'id_parking_lot' => $data['id_parking_lot'],
        ]);
    }

    public function getAdditionalServiceById(int $id)
    {
        return AdditionalService::with('parkingLot')->findOrFail($id);
    }

    public function updateAdditionalService(int $id, array $data)
    {
        $service = AdditionalService::findOrFail($id);
        $service->update([
            'name' => $data['name'],
            'cost' => $data['cost'],
        ]);

        return $service;
    }

    public function deleteAdditionalService(int $id)
    {
        $service = AdditionalService::findOrFail($id);
        $service->delete();
    }

    public function getAdditionalServicesByParkingId(int $id){

        return AdditionalService::where('id_parking_lot', $id)
        ->orderByDesc('id')
        ->get();
    }
}

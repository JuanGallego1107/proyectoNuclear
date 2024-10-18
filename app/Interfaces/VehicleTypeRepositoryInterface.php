<?php

namespace App\Interfaces;

interface VehicleTypeRepositoryInterface
{
    /**
     * Retrieve all vehicle types from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllVehicleTypes();

    /**
     * Create a new vehicle type record.
     *
     * @param array $data
     * @return \App\Models\VehicleType
     */
    public function createVehicleType(array $data);

    /**
     * Retrieve a specific vehicle type by its ID.
     *
     * @param int $id
     * @return \App\Models\VehicleType
     */
    public function getVehicleTypeById(int $id);

    /**
     * Update an existing vehicle type record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\VehicleType
     */
    public function updateVehicleType(array $data, int $id);

    /**
     * Delete a vehicle type by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteVehicleType(int $id);
}

<?php

namespace App\Interfaces;

interface ParkingSpaceRepositoryInterface
{
    /**
     * Retrieve all parking spaces with their associated parking lots, ordered by ID in descending order.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllParkingSpaces();

    /**
     * Create a new parking space record.
     *
     * @param array $data
     * @return \App\Models\ParkingSpace
     */
    public function createParkingSpace(array $data);

    /**
     * Retrieve a specific parking space by its ID, along with its associated parking lot.
     *
     * @param int $id
     * @return \App\Models\ParkingSpace
     */
    public function getParkingSpaceById(int $id);

    /**
     * Update an existing parking space record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\ParkingSpace
     */
    public function updateParkingSpace(array $data, int $id);

    /**
     * Delete a parking space by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteParkingSpace(int $id);
}

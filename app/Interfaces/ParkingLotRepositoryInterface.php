<?php

namespace App\Interfaces;

interface ParkingLotRepositoryInterface
{
    /**
     * Retrieve a paginated list of all parking lots, ordered by ID in descending order.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllParkingLots();

    /**
     * Create a new parking lot record.
     *
     * @param array $data
     * @return \App\Models\ParkingLot
     */
    public function createParkingLot(array $data);

    /**
     * Retrieve a specific parking lot by its ID.
     *
     * @param int $id
     * @return \App\Models\ParkingLot
     */
    public function getParkingLotById(int $id);

    /**
     * Update an existing parking lot record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\ParkingLot
     */
    public function updateParkingLot(array $data, int $id);

    /**
     * Delete a parking lot by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteParkingLot(int $id);
}

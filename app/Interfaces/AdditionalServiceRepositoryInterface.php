<?php

namespace App\Interfaces;

use App\Models\AdditionalService;
use Illuminate\Database\Eloquent\Collection;

interface AdditionalServiceRepositoryInterface
{
    /**
     * Retrieve a list of all additional services.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllAdditionalServices();

    /**
     * Create a new additional service.
     *
     * @param array $data
     * @return \App\Models\AdditionalService
     */
    public function createAdditionalService(array $data);

    /**
     * Retrieve a specific additional service by its ID.
     *
     * @param int $id
     * @return \App\Models\AdditionalService
     */
    public function getAdditionalServiceById(int $id);

    /**
     * Update an existing additional service by its ID.
     *
     * @param int $id
     * @param array $data
     * @return AdditionalService
     */
    public function updateAdditionalService(int $id, array $data);

    /**
     * Delete an additional service by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteAdditionalService(int $id);

    /**
     * Get additional services by parking lot id
     *
     * @param int $id
     * @return Collection
     */
    public function getAdditionalServicesByParkingId(int $id);
}

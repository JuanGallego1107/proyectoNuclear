<?php

namespace App\Interfaces;

interface FeeRepositoryInterface
{
    /**
     * Retrieve a list of all fees with related vehicle types and parking lots.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllFees();

    /**
     * Create a new fee record.
     *
     * @param array $data
     * @return \App\Models\Fee
     */
    public function createFee(array $data);

    /**
     * Retrieve a specific fee by its ID, including related vehicle types and parking lots.
     *
     * @param int $id
     * @return \App\Models\Fee
     */
    public function getFeeById(int $id);

    /**
     * Update an existing fee record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Fee
     */
    public function updateFee(array $data, int $id);

    /**
     * Delete a fee by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteFee(int $id);
}

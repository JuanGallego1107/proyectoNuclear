<?php

namespace App\Interfaces;

interface ReservationStateRepositoryInterface
{
    /**
     * Retrieve all reservation states from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllReservationStates();

    /**
     * Create a new reservation state record.
     *
     * @param array $data
     * @return \App\Models\ReservationState
     */
    public function createReservationState(array $data);

    /**
     * Retrieve a specific reservation state by its ID.
     *
     * @param int $id
     * @return \App\Models\ReservationState
     */
    public function getReservationStateById(int $id);

    /**
     * Update an existing reservation state record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\ReservationState
     */
    public function updateReservationState(array $data, int $id);

    /**
     * Delete a reservation state by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteReservationState(int $id);
}

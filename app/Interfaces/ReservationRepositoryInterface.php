<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ReservationRepositoryInterface
{
    /**
     * Retrieve all reservations from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllReservations();

    /**
     * Retrieve a specific reservation by its ID.
     *
     * @param int $id
     * @return \App\Models\Reservation|null
     */
    public function getReservationById(int $id);

    /**
     * Create a new reservation record.
     *
     * @param array $data
     * @return \App\Models\Reservation
     */
    public function createReservation(array $data);

    /**
     * Update an existing reservation by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Reservation
     */
    public function updateReservation(array $data, int $id);

    /**
     * Delete a reservation by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteReservation(int $id);

    /**
     * Update the reservation state of a specific reservation.
     *
     * @param int $id
     * @param int $reservationStateId
     * @return \App\Models\Reservation
     */
    public function updateReservationState(array $data, int $id);

    /**
     * Retrieve a specific reservation by a reservation unique id
     *
     * @param int $id
     * @return Collection|null
     */
    public function getReservationByUniqueReservationId(string $id);
}

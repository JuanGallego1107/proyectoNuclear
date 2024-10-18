<?php

namespace App\Repositories;

use App\Interfaces\ReservationStateRepositoryInterface;
use App\Models\ReservationState;

class ReservationStateRepository implements ReservationStateRepositoryInterface
{
    public function getAllReservationStates()
    {
        return ReservationState::get();
    }

    public function createReservationState(array $data)
    {
        return ReservationState::create([
            'name' => $data['name'],
        ]);
    }

    public function getReservationStateById(int $id)
    {
        return ReservationState::findOrFail($id);
    }

    public function updateReservationState(array $data, int $id)
    {
        $state = ReservationState::findOrFail($id);

        $state->update([
            'name' => $data['name'],
        ]);

        return $state;
    }

    public function deleteReservationState(int $id)
    {
        $state = ReservationState::findOrFail($id);
        $state->delete();
    }
}

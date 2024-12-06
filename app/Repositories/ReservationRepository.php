<?php

namespace App\Repositories;

use App\Interfaces\ReservationRepositoryInterface;
use App\Models\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{

    public function getAllReservations()
    {
        return Reservation::orderByDesc('id')->get();
    }

    public function getReservationById(int $id)
    {
        return Reservation::findOrFail($id);
    }

    public function createReservation(array $data)
    {
        return Reservation::create([
            'payment_date' => $data['payment_date'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_id' => $data['customer_id'],
            'total' => $data['total'],
            'id_reservation_state' => $data['id_reservation_state'],
            'id_payment_method' => $data['id_payment_method'],
            'id_parking_space' => $data['id_parking_space'],
            'id_fee' => $data['id_fee'],
        ]);
        
    }

    public function updateReservation(array $data, int $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'payment_date' => $data['payment_date'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_id' => $data['customer_id'],
            'total' => $data['total'],
            'id_reservation_state' => $data['id_reservation_state'],
            'id_payment_method' => $data['id_payment_method'],
            'id_parking_space' => $data['id_parking_space'],
            'id_fee' => $data['id_fee'],
        ]);

        return $reservation;
    }

    public function deleteReservation(int $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
    }

    public function updateReservationState(array $data, int $id)
    {
        // Encuentra la reserva por el ID proporcionado en los datos o por el último registro
        if (!empty($data['id'])) {
            $reservation = Reservation::findOrFail($data['id']);
        } else {
            $reservation = Reservation::orderByDesc('id')->first();
        }
    
        // Actualiza el estado de la reserva
        $reservation->update([
            'id_reservation_state' => $data['id_reservation_state'],
        ]);
    
        // Carga las relaciones parking_lot y reservation_state
        $reservation->loadMissing(['parkingSpace.parkingLot', 'reservationState']);
    
        return $reservation;
    }

    public function getReservationByUniqueReservationId(string $id)
    {
        return Reservation::with([
            'reservationState',
            'parkingSpace',
            'fee.vehicleType'
        ])
        ->where('reservation_number', '=', $id)
        ->get();
    }
}

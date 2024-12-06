<?php

namespace App\Http\Controllers;

use App\Interfaces\ReservationRepositoryInterface;
use App\Mail\OwnerReservationMailable;
use App\Mail\OwnerStatusUpdateMailable;
use App\Mail\PostCreateMailable;
use App\Mail\ReservationStatusUpdateMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    protected $reservationRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param ReservationRepositoryInterface $reservationRepository
     */
    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Display a listing of the reservations.
     *
     * Retrieves a list of all reservations, ordered by the most recent first.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $reservations = $this->reservationRepository->getAllReservations();
        return response()->json($reservations);
    }

    /**
     * Store a newly created reservation in storage.
     *
     * Validates the request and creates a new reservation record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_date' => '',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_id' => 'required|integer',
            'total' => 'required|integer',
            'id_reservation_state' => 'required|integer',
            'id_payment_method' => 'required|integer',
            'id_parking_space' => 'required|integer',
            'id_fee' => 'required|integer',
        ]);

        $reservation = $this->reservationRepository->createReservation($request->all());

        // Send email to customer
        Mail::to($reservation->customer_email)->send(new PostCreateMailable($reservation));

        // Send email to parking administrator
        Mail::to('email-del-dueno@ejemplo.com')
        ->send(new OwnerReservationMailable($reservation));

        return response()->json($reservation);
    }

    /**
     * Display the specified reservation.
     *
     * Retrieves and returns a specific reservation by its ID.
     *
     * @param int $id The ID of the reservation to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $reservation = $this->reservationRepository->getReservationById($id);
        return response()->json($reservation);
    }

    /**
     * Update the specified reservation in storage.
     *
     * Validates the request and updates the existing reservation record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the reservation to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'payment_date' => 'sometimes|date',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'customer_name' => 'sometimes|string',
            'customer_email' => 'sometimes|email',
            'customer_id' => 'sometimes|integer',
            'total' => 'sometimes|integer',
            'id_reservation_state' => 'sometimes|integer',
            'id_payment_method' => 'sometimes|integer',
            'id_parking_space' => 'sometimes|integer',
            'id_fee' => 'sometimes|integer',
        ]);

        $this->reservationRepository->updateReservation($request->all(), $id);
    }

    /**
     * Remove the specified reservation from storage.
     *
     * Deletes the specified reservation by its ID.
     *
     * @param int $id The ID of the reservation to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->reservationRepository->deleteReservation($id);
    }

    /**
     * Update the reservation state for a specific reservation.
     *
     * Updates the state of the reservation by its ID.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the reservation to update.
     * @return
     */
    public function updateReservationState(Request $request, int $id)
    {

        $request->validate([
            'id_reservation_state' => 'required|integer',
        ]);

        $reservation = $this->reservationRepository->updateReservationState($request->all(), $id);

        // Email notification for the reservation update to customer
        Mail::to($reservation->customer_email)
        ->send(new ReservationStatusUpdateMailable($reservation));

        // Email notification for the reservation update to parking owner
        Mail::to('email-del-dueno@gmail.com')
        ->send(new OwnerStatusUpdateMailable($reservation));

       return $reservation;
    }

    /**
     * Display the specified reservation.
     *
     * Retrieves and returns a specific reservation by a unique reservation number.
     *
     * @param int $id The ID of the reservation to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReservationByUniqueReservationId(string $id)
    {
        $reservation = $this->reservationRepository->getReservationByUniqueReservationId($id);
        return response()->json($reservation);
    }
}

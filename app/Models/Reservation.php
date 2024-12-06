<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_date',
        'start_date',
        'end_date',
        'customer_name',
        'customer_email',
        'customer_id',
        'total',
        'id_reservation_state',
        'id_payment_method',
        'id_parking_space',
        'id_fee',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'payment_date' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Relationships.
     */

    // Reservation State relationship
    public function reservationState()
    {
        return $this->belongsTo(ReservationState::class, 'id_reservation_state');
    }

    // Payment Method relationship
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'id_payment_method');
    }

    // Parking Space relationship
    public function parkingSpace()
    {
        return $this->belongsTo(ParkingSpace::class, 'id_parking_space');
    }

    // Fee relationship
    public function fee()
    {
        return $this->belongsTo(Fee::class, 'id_fee');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reservation) {
            do {
                // Generar un número aleatorio de 6 dígitos
                $reservation->reservation_number = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            } while (self::where('reservation_number', $reservation->reservation_number)->exists());
        });
    }
}

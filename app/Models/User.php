<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',      // The username of the user
        'name',           // The full name of the user
        'password',       // The user's password
        'phone_number',   // The user's phone number
        'id_number',      // The user's identification number
        'email',          // The user's email address
        'state',          // The current state of the user (e.g., active, inactive)
        'id_role',        // Foreign key linking to the user's role
        'id_parking_lot'  // Foreign key linking to the user's associated parking lot
    ];

    /**
     * Get the role associated with the user.
     *
     * Defines a many-to-one relationship with the Role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    /**
     * Get the parking lot associated with the user.
     *
     * Defines a many-to-one relationship with the ParkingLot model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class, 'id_parking_lot', 'id');
    }
}

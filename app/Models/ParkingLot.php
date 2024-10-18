<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingLot extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',          // The name of the parking lot
        'address',       // The address of the parking lot
        'phone_number',  // The contact phone number for the parking lot
        'nit',           // The NIT (tax identification number) of the parking lot
        'coord_x',      // X coordinate for location tracking
        'coord_y',      // Y coordinate for location tracking
    ];

    protected $cascadeDeletes = ['users', 'daySchedule', 'parkingSpace', 'fee', 'additionService'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the users associated with the parking lot.
     *
     * Defines a one-to-many relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_parking_lot');
    }

    /**
     * Get the day schedules associated with the parking lot.
     *
     * Defines a one-to-many relationship with the DaySchedule model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daySchedule()
    {
        return $this->hasMany(DaySchedule::class, 'id_parking_lot');
    }

    /**
     * Get the parking spaces associated with the parking lot.
     *
     * Defines a one-to-many relationship with the ParkingSpace model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parkingSpace()
    {
        return $this->hasMany(ParkingSpace::class, 'id_parking_lot');
    }

    /**
     * Get the fees associated with the parking lot.
     *
     * Defines a one-to-many relationship with the Fee model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fee()
    {
        return $this->hasMany(Fee::class, 'id_parking_lot');
    }

    /**
     * Get the additional services associated with the parking lot.
     *
     * Defines a one-to-many relationship with the AdditionalService model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function additionService()
    {
        return $this->hasMany(AdditionalService::class, 'id_parking_lot');
    }
}

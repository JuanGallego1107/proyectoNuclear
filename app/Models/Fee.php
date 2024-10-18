<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',              // The name of the fee
        'cost',              // The cost associated with the fee
        'id_parking_lot',    // ID of the associated parking lot
        'id_vehicle_type'    // ID of the associated vehicle type
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the vehicle type associated with the fee.
     *
     * Defines a many-to-one relationship with the VehicleType model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'id_vehicle_type', 'id');
    }

    /**
     * Get the parking lot associated with the fee.
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

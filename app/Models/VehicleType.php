<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' // The name of the vehicle type
    ];

    protected $cascadeDeletes = ['fee'];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the fees associated with the vehicle type.
     *
     * Defines a one-to-many relationship with the Fee model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fee()
    {
        return $this->hasMany(Fee::class, 'id_vehicle_type');
    }
}

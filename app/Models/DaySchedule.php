<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaySchedule extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_week_day',  // ID of the associated weekday
        'id_schedule',   // ID of the associated schedule
        'id_parking_lot' // ID of the associated parking lot
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the weekday associated with the day schedule.
     *
     * Defines a many-to-one relationship with the WeekDay model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class, 'id_week_day', 'id');
    }

    /**
     * Get the schedule associated with the day schedule.
     *
     * Defines a many-to-one relationship with the Schedule model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id_schedule', 'id');
    }

    /**
     * Get the parking lot associated with the day schedule.
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

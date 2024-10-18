<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time',  // The start time of the schedule
        'end_time'     // The end time of the schedule
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the day schedules associated with the schedule.
     *
     * Defines a one-to-many relationship with the DaySchedule model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daySchedule()
    {
        return $this->hasMany(DaySchedule::class, 'id_schedule');
    }
}

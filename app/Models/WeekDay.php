<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeekDay extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_number', // The numerical representation of the day (e.g., 1 for Monday)
        'name'        // The name of the day (e.g., 'Monday')
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the day schedules associated with the week day.
     *
     * Defines a one-to-many relationship with the DaySchedule model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daySchedules()
    {
        return $this->hasMany(DaySchedule::class, 'id_week_day');
    }
}

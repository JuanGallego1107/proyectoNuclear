<?php

use App\Http\Controllers\AdditionalServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DayScheduleController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ParkingLotController;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReservationStateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\WeekDayController;
use Illuminate\Support\Facades\Route;

// Define API routes for the Role resource
Route::apiResource('/roles', RoleController::class);

// Define API routes for the ParkingLot resource
Route::apiResource('/parking-lots', ParkingLotController::class);

// Define API routes for the User resource
Route::apiResource('/users', UserController::class);

// Define API routes for the ReservationState resource
Route::apiResource('/reservation-states', ReservationStateController::class);

// Define API routes for the PaymentMethod resource
Route::apiResource('/payment-methods', PaymentMethodController::class);

// Define API routes for the AdditionalService resource
Route::apiResource('/additional-services', AdditionalServiceController::class);

// Define API routes for the WeekDay resource
Route::apiResource('/week-days', WeekDayController::class);

// Define API routes for the Schedule resource
Route::apiResource('/schedules', ScheduleController::class);

// Define API routes for the DaySchedule resource
Route::apiResource('/day-schedules', DayScheduleController::class);

// Define a custom route for updating a schedule in the DaySchedule resource
Route::put('/update-day-schedule', [DayScheduleController::class, 'updateScheduleDay']);

// Define API routes for the VehicleType resource
Route::apiResource('/vehicle-types', VehicleTypeController::class);

// Define API routes for the Fee resource
Route::apiResource('/fees', FeeController::class);

// Define API routes for the ParkingSpace resource
Route::apiResource('/parking-spaces', ParkingSpaceController::class);

// Define a custom route to check user credentials
Route::post('/login', [AuthController::class, 'login']);

<?php

use App\Http\Controllers\AdditionalServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DayScheduleController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ParkingLotController;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReservationController;
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

// Define a custom route for get the additional services by parking id
Route::get('/additional-services-by-parking/{parkingLotId}', [AdditionalServiceController::class, 'getAdditionalServicesByParkingId']);

// Define API routes for the WeekDay resource
Route::apiResource('/week-days', WeekDayController::class);

// Define API routes for the Schedule resource
Route::apiResource('/schedules', ScheduleController::class);

// Define API routes for the DaySchedule resource
Route::apiResource('/day-schedules', DayScheduleController::class);

// Define a custom route for get day schedules by a parking lot id
Route::get('/day-schedules-by-parking/{parkingLotId}', [DayScheduleController::class, 'getDaySchedulesByParkingLotId']);

// Define a custom route for updating a schedule in the DaySchedule resource
Route::put('/update-day-schedule', [DayScheduleController::class, 'updateScheduleDay']);

// Define API routes for the VehicleType resource
Route::apiResource('/vehicle-types', VehicleTypeController::class);

// Define API routes for the Fee resource
Route::apiResource('/fees', FeeController::class);

// Define a custom route for get the fees by parking id
Route::get('/fees-by-parking/{parkingLotId}', [FeeController::class, 'getFeesByParkingId']);

// Define API routes for the ParkingSpace resource
Route::apiResource('/parking-spaces', ParkingSpaceController::class);

// Define a custom route for get the parking spaces by parking id
Route::get('/parking-spaces-by-parking/{parkingLotId}', [ParkingSpaceController::class, 'getParkingSpacesByParkingLotId']);

// Define a custom route to check user credentials
Route::post('/login', [AuthController::class, 'login']);

// Define API routes for the Reservation resource
Route::apiResource('/reservations', ReservationController::class);

// Define a custom route for get the reservations by customer document id
Route::get('/reservation-by-number/{id}', [ReservationController::class, 'getReservationByUniqueReservationId']);

// Define a custom route for update a reservation state
Route::put('/reservations/update-state/{id}', [ReservationController::class, 'updateReservationState']);
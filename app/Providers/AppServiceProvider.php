<?php

namespace App\Providers;

use App\Interfaces\AdditionalServiceRepositoryInterface;
use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\DayScheduleRepositoryInterface;
use App\Interfaces\FeeRepositoryInterface;
use App\Interfaces\ParkingLotRepositoryInterface;
use App\Interfaces\ParkingSpaceRepositoryInterface;
use App\Interfaces\PaymentMethodRepositoryInterface;
use App\Interfaces\ReservationStateRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\ScheduleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VehicleTypeRepositoryInterface;
use App\Interfaces\WeekDayRepositoryInterface;
use App\Repositories\AdditionalServiceRepository;
use App\Repositories\AuthRepository;
use App\Repositories\DayScheduleRepository;
use App\Repositories\FeeRepository;
use App\Repositories\ParkingLotRepository;
use App\Repositories\ParkingSpaceRepository;
use App\Repositories\PaymentMethodRepository;
use App\Repositories\ReservationStateRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleTypeRepository;
use App\Repositories\WeekDayRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding interfaces to their implementations
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(AdditionalServiceRepositoryInterface::class, AdditionalServiceRepository::class);
        $this->app->bind(DayScheduleRepositoryInterface::class, DayScheduleRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(ParkingLotRepositoryInterface::class, ParkingLotRepository::class);
        $this->app->bind(ParkingSpaceRepositoryInterface::class, ParkingSpaceRepository::class);
        $this->app->bind(PaymentMethodRepositoryInterface::class, PaymentMethodRepository::class);
        $this->app->bind(ReservationStateRepositoryInterface::class, ReservationStateRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VehicleTypeRepositoryInterface::class, VehicleTypeRepository::class);
        $this->app->bind(WeekDayRepositoryInterface::class, WeekDayRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

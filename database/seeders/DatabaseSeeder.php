<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolSeeder::class);
        $this->call(ParkingLotSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ReservationStateSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(AdditionalServiceSeeder::class);
        $this->call(WeekDaySeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(DayScheduleSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(FeeSeeder::class);
        $this->call(ParkingSpaceSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}

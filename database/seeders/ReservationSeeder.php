<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'reservation_number' => '324dfg',
                'payment_date' => now()->subDays(rand(1, 30)),
                'start_date' => now()->subDays(rand(1, 10)),
                'end_date' => now()->addDays(rand(1, 10)),
                'customer_name' => 'John Doe',
                'customer_email' => 'johndoe@example.com',
                'customer_id' => rand(1, 4),
                'total' => 12000,
                'id_reservation_state' => rand(1, 4),
                'id_payment_method' => rand(1, 4),
                'id_parking_space' => rand(1, 4),
                'id_fee' => rand(1, 4),
            ],
            [
                'reservation_number' => '4534yt',
                'payment_date' => now()->subDays(rand(1, 30)),
                'start_date' => now()->subDays(rand(1, 10)),
                'end_date' => now()->addDays(rand(1, 10)),
                'customer_name' => 'Jane Smith',
                'customer_email' => 'janesmith@example.com',
                'customer_id' => rand(1, 4),
                'total' => 12000,
                'id_reservation_state' => rand(1, 4),
                'id_payment_method' => rand(1, 4),
                'id_parking_space' => rand(1, 4),
                'id_fee' => rand(1, 4),
            ],
            [
                'reservation_number' => '324dft',
                'payment_date' => now()->subDays(rand(1, 30)),
                'start_date' => now()->subDays(rand(1, 10)),
                'end_date' => now()->addDays(rand(1, 10)),
                'customer_name' => 'Alice Johnson',
                'customer_email' => 'alicejohnson@example.com',
                'customer_id' => rand(1, 4),
                'total' => 12000,
                'id_reservation_state' => rand(1, 4),
                'id_payment_method' => rand(1, 4),
                'id_parking_space' => rand(1, 4),
                'id_fee' => rand(1, 4),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'PSE',
        ]);

        PaymentMethod::create([
            'name' => 'Tarjeta de crédito',
        ]);

        PaymentMethod::create([
            'name' => 'Tarjeta de débito',
        ]);

        PaymentMethod::create([
            'name' => 'PayPal',
        ]);
    }
}

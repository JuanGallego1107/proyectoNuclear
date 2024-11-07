<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingLot>
 */
class ParkingLotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'nit' => $this->faker->unique()->numerify('########'), // Número de 8 dígitos
            'coord_x' => $this->faker->latitude,
            'coord_y' => $this->faker->longitude,
        ];
    }
}

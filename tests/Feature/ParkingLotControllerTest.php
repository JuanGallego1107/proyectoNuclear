<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ParkingLot; // Asegúrate de que el modelo existe
use Illuminate\Foundation\Testing\WithFaker;

class ParkingLotControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test the index endpoint returns a successful response.
     */
    public function test_index_returns_successful_response()
    {
        $response = $this->get('/api/parking-lots');
        $response->assertStatus(200);
    }

    /**
     * Test the store endpoint creates a parking lot.
     */
    public function test_store_creates_parking_lot()
    {
        $data = [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'nit' => $this->faker->unique()->randomNumber(8),
            'coord_x' => $this->faker->latitude,
            'coord_y' => $this->faker->longitude,
        ];

        $response = $this->postJson('/api/parking-lots', $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('parking_lots', ['name' => $data['name']]);
    }

    /**
     * Test the show endpoint retrieves a specific parking lot.
     */
    public function test_show_returns_specific_parking_lot()
    {
        $parkingLot = ParkingLot::factory()->create();

        $response = $this->get("/api/parking-lots/{$parkingLot->id}");
        $response->assertStatus(200)
            ->assertJson([
                'id' => $parkingLot->id,
                'name' => $parkingLot->name,
                // Agrega más campos si es necesario
            ]);
    }

    /**
     * Test the update endpoint modifies an existing parking lot.
     */
    public function test_update_modifies_parking_lot()
    {
        $parkingLot = ParkingLot::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'nit' => $this->faker->unique()->randomNumber(8),
            'coord_x' => $this->faker->latitude,
            'coord_y' => $this->faker->longitude,
        ];

        $response = $this->putJson("/api/parking-lots/{$parkingLot->id}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('parking_lots', ['id' => $parkingLot->id, 'name' => 'Updated Name']);
    }

    /**
     * Test the destroy endpoint deletes a parking lot.
     */
    public function test_destroy_deletes_parking_lot()
    {
        $parkingLot = ParkingLot::factory()->create();

        $response = $this->delete("/api/parking-lots/{$parkingLot->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('parking_lots', ['id' => 1]);
    }
}

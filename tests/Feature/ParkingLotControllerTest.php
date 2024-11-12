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
     * REPOSITORY UNIT TESTING
     */

    public function test_create_parking_lot_with_repository()
    {
        $data = [
            'name' => 'Parqueadero Nuevo',
            'address' => 'Avenida Siempre Viva 123',
            'phone_number' => '987654321',
            'nit' => '123456789-0',
            'coord_x' => '4.560000',
            'coord_y' => '-75.670000',
        ];

        $repository = new \App\Repositories\ParkingLotRepository();
        $createdParkingLot = $repository->createParkingLot($data);

        $this->assertDatabaseHas('parking_lots', ['name' => 'Parqueadero Nuevo']);
        $this->assertEquals($data['name'], $createdParkingLot->name);
    }

    public function test_get_parking_lot_by_id_with_repository()
    {
        $parkingLot = ParkingLot::factory()->create();

        $repository = new \App\Repositories\ParkingLotRepository();
        $fetchedParkingLot = $repository->getParkingLotById($parkingLot->id);

        $this->assertEquals($parkingLot->id, $fetchedParkingLot->id);
        $this->assertEquals($parkingLot->name, $fetchedParkingLot->name);
    }

    public function test_update_parking_lot_with_repository(){
        $parkingLot = ParkingLot::factory()->create();
        $updatedData = [
            'name' => 'Parqueadero Actualizado',
            'address' => 'Calle Falsa 456',
            'phone_number' => '123456789',
            'nit' => '987654321-0',
            'coord_x' => '4.570000',
            'coord_y' => '-75.660000',
        ];

        $repository = new \App\Repositories\ParkingLotRepository();
        $updatedParkingLot = $repository->updateParkingLot($updatedData, $parkingLot->id);

        $this->assertEquals('Parqueadero Actualizado', $updatedParkingLot->name);
        $this->assertDatabaseHas('parking_lots', ['id' => $parkingLot->id, 'name' => 'Parqueadero Actualizado']);
    }
}

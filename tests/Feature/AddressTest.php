<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_can_create_address()
    {
        $user = User::factory()->admin()->create();

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/addresses', [
            'user_id'    => $user->id,
            'street'     => 'Main St',
            'number'     => '123',
            'neighborhood'   => 'Centro',
            'complement' => 'Apto 101',
            'zip_code'   => '12345-678',
        ]);

        $response->assertCreated()
                 ->assertJsonFragment(['street' => 'Main St']);
    }
}

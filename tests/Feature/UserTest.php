<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_admin_can_create_user()
    {
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin);

        $response = $this->postJson('/api/users', [
            'name'     => 'Test User',
            'email'    => 'user@example.com',
            'phone'    => '987654321',
            'cpf'      => '987.654.321-00',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertCreated()
                 ->assertJsonStructure(['id', 'name', 'email']);
    }

    public function test_admin_can_assign_permission_to_user()
    {
        $admin = User::factory()->admin()->create();
        $user  = User::factory()->create();

        Sanctum::actingAs($admin);

        $response = $this->postJson('/api/permissions', [
            'user_id'    => $user->id,
            'roles' => ['admin', 'editor'],
        ]);

        $response->assertNoContent();
    }
}

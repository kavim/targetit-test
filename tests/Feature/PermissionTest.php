<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_assign_permissions()
    {
        $targetUser = User::factory()->create();
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin);

        $response = $this->postJson("/api/permissions", [
            'user_id' => $targetUser->id,
            'roles' => ['admin', 'editor']
        ]);

        $response->assertNoContent();
        $this->assertDatabaseHas('permissions', [
            'user_id' => $targetUser->id,
            'permission' => 'admin',
        ]);
        $this->assertDatabaseHas('permissions', [
            'user_id' => $targetUser->id,
            'permission' => 'editor',
        ]);
    }

    /** @test */
    public function unauthenticated_user_cannot_assign_permissions()
    {
        $targetUser = User::factory()->create();

        $response = $this->postJson("/api/permissions", [
            'user_id' => $targetUser->id,
            'roles' => ['admin']
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function request_fails_with_invalid_roles()
    {
        $targetUser = User::factory()->create();
        $admin = User::factory()->admin()->create();

        Sanctum::actingAs($admin);

        $response = $this->postJson("/api/permissions", [
            'user_id' => $targetUser->id,
            'roles' => ['invalid_role']
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['roles.0']);
    }

    /** @test */
    public function assigning_permissions_replaces_old_permissions()
    {
        $targetUser = User::factory()->create();
        $admin = User::factory()->admin()->create();

        // Permissão inicial
        Permission::create(['user_id' => $targetUser->id, 'permission' => 'user']);

        Sanctum::actingAs($admin);

        $this->postJson("/api/permissions", [
            'user_id' => $targetUser->id,
            'roles' => ['editor']
        ])->assertNoContent();

        $this->assertDatabaseMissing('permissions', [
            'user_id' => $targetUser->id,
            'permission' => 'user'
        ]);
        $this->assertDatabaseHas('permissions', [
            'user_id' => $targetUser->id,
            'permission' => 'editor'
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'phone'    => $this->faker->phoneNumber,
            'cpf'      => $this->faker->unique()->numerify('###.###.###-##'),
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertCreated();
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email'    => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertOk();
    }
}

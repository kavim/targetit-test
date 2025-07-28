<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()
            ->admin()
            ->create([
                'name'     => 'Super Admin',
                'email'    => 'admin@example.com',
                'phone'    => '51999999999',
                'cpf'      => '000.000.000-00',
                'password' => Hash::make('admin123'),
            ]);
    }
}

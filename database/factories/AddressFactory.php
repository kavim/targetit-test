<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'street'     => $this->faker->streetName(),
            'number'     => $this->faker->buildingNumber(),
            'neighborhood'   => $this->faker->citySuffix(),
            'complement' => $this->faker->secondaryAddress(),
            'zip_code'   => $this->faker->postcode(),
        ];
    }
}


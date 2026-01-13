<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{50}'),
            'jedinica_mere' => fake()->randomElement(['kg', 'l', 'kom']),
            'ukupna_kolicina' => fake()->numberBetween(-10000, 10000),
            'cena' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}

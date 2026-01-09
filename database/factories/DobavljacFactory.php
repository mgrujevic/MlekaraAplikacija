<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DobavljacFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{50}'),
            'kontakt_osoba' => fake()->regexify('[A-Za-z0-9]{50}'),
            'adresa' => fake()->regexify('[A-Za-z0-9]{50}'),
            'telefon' => fake()->regexify('[A-Za-z0-9]{50}'),
            'email' => fake()->safeEmail(),
        ];
    }
}

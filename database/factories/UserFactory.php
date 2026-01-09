<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ime' => fake()->regexify('[A-Za-z0-9]{50}'),
            'prezime' => fake()->regexify('[A-Za-z0-9]{50}'),
            'korisnicko_ime' => fake()->regexify('[A-Za-z0-9]{20}'),
            'uloga' => fake()->randomElement(["administrator","operater","menadzer_prodaje"]),
            'lozinka' => fake()->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}

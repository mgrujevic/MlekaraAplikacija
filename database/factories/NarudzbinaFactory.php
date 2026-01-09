<?php

namespace Database\Factories;

use App\Models\Kupci;
use App\Models\Proizvodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'proizvod_id' => Proizvodi::factory(),
            'kupac_id' => Kupci::factory(),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'datum' => fake()->date(),
            'status' => fake()->randomElement(["kreirana","u_obradi","isporucena","otkazana"]),
        ];
    }
}

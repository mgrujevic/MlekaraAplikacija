<?php

namespace Database\Factories;

use App\Models\Proizvodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class SerijaProizvodaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'proizvod_id' => Proizvodi::factory(),
            'proizvedena_kolicina' => fake()->numberBetween(-10000, 10000),
            'datum_proizvodnje' => fake()->dateTime(),
        ];
    }
}

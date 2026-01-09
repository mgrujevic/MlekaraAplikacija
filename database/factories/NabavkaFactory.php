<?php

namespace Database\Factories;

use App\Models\Dobavljaci;
use App\Models\Sirovine;
use Illuminate\Database\Eloquent\Factories\Factory;

class NabavkaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'dobavljac_id' => Dobavljaci::factory(),
            'sirovina_id' => Sirovine::factory(),
            'datum' => fake()->dateTime(),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'cena' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\SerijaProizvoda;
use App\Models\Sirovine;
use Illuminate\Database\Eloquent\Factories\Factory;

class PotrosnjaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'serija_proizvoda_id' => SerijaProizvoda::factory(),
            'sirovina_id' => Sirovine::factory(),
            'kolicina' => fake()->numberBetween(-10000, 10000),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\SerijaProizvoda;
use Illuminate\Database\Seeder;

class SerijaProizvodaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SerijaProizvoda::create([
            'proizvod_id' => 1,
            'proizvedena_kolicina' => 200,
            'datum_proizvodnje' => now()->subDays(4),
        ]);

        SerijaProizvoda::create([
            'proizvod_id' => 2,
            'proizvedena_kolicina' => 300,
            'datum_proizvodnje' => now()->subDays(3),
        ]);

        SerijaProizvoda::create([
            'proizvod_id' => 3,
            'proizvedena_kolicina' => 120,
            'datum_proizvodnje' => now()->subDays(2),
        ]);

        SerijaProizvoda::create([
            'proizvod_id' => 4,
            'proizvedena_kolicina' => 180,
            'datum_proizvodnje' => now()->subDays(1),
        ]);

        SerijaProizvoda::create([
            'proizvod_id' => 5,
            'proizvedena_kolicina' => 90,
            'datum_proizvodnje' => now(),
        ]);
    }
}

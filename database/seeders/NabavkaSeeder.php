<?php

namespace Database\Seeders;

use App\Models\Nabavka;
use Illuminate\Database\Seeder;

class NabavkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nabavka::create([
            'dobavljac_id' => 1,
            'sirovina_id' => 1,
            'datum' => now()->subDays(5),
            'kolicina' => 1000,
            'cena' => 65000,
        ]);

        Nabavka::create([
            'dobavljac_id' => 2,
            'sirovina_id' => 2,
            'datum' => now()->subDays(4),
            'kolicina' => 200,
            'cena' => 18000,
        ]);

        Nabavka::create([
            'dobavljac_id' => 3,
            'sirovina_id' => 3,
            'datum' => now()->subDays(3),
            'kolicina' => 150,
            'cena' => 22000,
        ]);

        Nabavka::create([
            'dobavljac_id' => 4,
            'sirovina_id' => 4,
            'datum' => now()->subDays(2),
            'kolicina' => 300,
            'cena' => 12000,
        ]);

        Nabavka::create([
            'dobavljac_id' => 5,
            'sirovina_id' => 4,
            'datum' => now()->subDays(1),
            'kolicina' => 50,
            'cena' => 9000,
        ]);
    }
}

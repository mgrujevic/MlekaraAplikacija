<?php

namespace Database\Seeders;

use App\Models\Narudzbina;
use Illuminate\Database\Seeder;

class NarudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Narudzbina::create([
            'proizvod_id' => 1,
            'kupac_id' => 1,
            'kolicina' => 50,
            'datum' => now()->subDays(4),
            'status' => 'kreirana',
        ]);

        Narudzbina::create([
            'proizvod_id' => 2,
            'kupac_id' => 2,
            'kolicina' => 80,
            'datum' => now()->subDays(3),
            'status' => 'u_obradi',
        ]);

        Narudzbina::create([
            'proizvod_id' => 3,
            'kupac_id' => 3,
            'kolicina' => 40,
            'datum' => now()->subDays(2),
            'status' => 'isporucena',
        ]);

        Narudzbina::create([
            'proizvod_id' => 4,
            'kupac_id' => 4,
            'kolicina' => 25,
            'datum' => now()->subDays(1),
            'status' => 'otkazana',
        ]);

        Narudzbina::create([
            'proizvod_id' => 5,
            'kupac_id' => 5,
            'kolicina' => 60,
            'datum' => now(),
            'status' => 'kreirana',
        ]);
    }
}

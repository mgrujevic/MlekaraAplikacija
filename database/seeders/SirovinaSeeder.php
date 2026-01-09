<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sirovina;

class SirovinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sirovina::create([
            'naziv' => 'Sirovo mleko',
            'jedinica_mere' => 'l',
            'kolicina' => 5000,
        ]);

        Sirovina::create([
            'naziv' => 'So',
            'jedinica_mere' => 'kg',
            'kolicina' => 300,
        ]);

        Sirovina::create([
            'naziv' => 'Ambalaža',
            'jedinica_mere' => 'kom',
            'kolicina' => 2000,
        ]);

        Sirovina::create([
            'naziv' => 'Starter kultura',
            'jedinica_mere' => 'kg',
            'kolicina' => 50,
        ]);
    }
}

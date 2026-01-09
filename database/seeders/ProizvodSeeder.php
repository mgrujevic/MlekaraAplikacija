<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proizvod::create([
            'naziv' => 'Jogurt 1L',
            'jedinica_mere' => 'l',
            'ukupna_kolicina' => 500,
            'cena' => 120,
        ]);

        Proizvod::create([
            'naziv' => 'Sveže mleko 2.8%',
            'jedinica_mere' => 'l',
            'ukupna_kolicina' => 800,
            'cena' => 110,
        ]);

        Proizvod::create([
            'naziv' => 'Mladi sir',
            'jedinica_mere' => 'kg',
            'ukupna_kolicina' => 250,
            'cena' => 650,
        ]);

        Proizvod::create([
            'naziv' => 'Pavlaka',
            'jedinica_mere' => 'kg',
            'ukupna_kolicina' => 150,
            'cena' => 480,
        ]);

        Proizvod::create([
            'naziv' => 'Maslac 250g',
            'jedinica_mere' => 'kom',
            'ukupna_kolicina' => 300,
            'cena' => 220,
        ]);
    }
}

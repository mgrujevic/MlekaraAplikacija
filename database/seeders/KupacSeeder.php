<?php

namespace Database\Seeders;

use App\Models\Kupac;
use Illuminate\Database\Seeder;

class KupacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kupac::create([
            'naziv' => 'Europrom',
            'adresa' => 'Bulevar kralja Aleksandra 210, Beograd',
            'kontakt_telefon' => '0112456789',
            'email' => 'nabavka@europrom.rs',
        ]);

        Kupac::create([
            'naziv' => 'AMAN',
            'adresa' => 'Cara Lazara 15, Novi Sad',
            'kontakt_telefon' => '021445566',
            'email' => 'info@aman.rs',
        ]);

        Kupac::create([
            'naziv' => 'DIS',
            'adresa' => 'Industrijska zona bb, Krnjevo',
            'kontakt_telefon' => '026334455',
            'email' => 'dis@dis.rs',
        ]);

        Kupac::create([
            'naziv' => 'Maxi',
            'adresa' => 'Autoput za Novi Sad 82, Beograd',
            'kontakt_telefon' => '0113344556',
            'email' => 'maxi@delhaize.rs',
        ]);

        Kupac::create([
            'naziv' => 'Idea',
            'adresa' => 'Nemanjina 12, Beograd',
            'kontakt_telefon' => '011778899',
            'email' => 'idea@idea.rs',
        ]);
    }
}

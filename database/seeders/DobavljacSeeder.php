<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dobavljac;

class DobavljacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dobavljac::create([
            'naziv' => 'Mlekara Zlatibor',
            'kontakt_osoba' => 'Marko Petrović',
            'adresa' => 'Zlatibor bb',
            'telefon' => '0641234567',
            'email' => 'kontakt@mlekarazlatibor.rs',
        ]);

        Dobavljac::create([
            'naziv' => 'Agro Plus DOO',
            'kontakt_osoba' => 'Jelena Jovanović',
            'adresa' => 'Industrijska zona 12, Čačak',
            'telefon' => '0639876543',
            'email' => 'agroplus@agro.rs',
        ]);

        Dobavljac::create([
            'naziv' => 'Eko Farma Milovanović',
            'kontakt_osoba' => 'Nenad Milovanović',
            'adresa' => 'Selo Donja Gorevnica',
            'telefon' => '0651122334',
            'email' => 'eko.farma@gmail.com',
        ]);

        Dobavljac::create([
            'naziv' => 'Bio Hrana Srbija',
            'kontakt_osoba' => 'Ivana Nikolić',
            'adresa' => 'Bulevar oslobođenja 88, Novi Sad',
            'telefon' => '062445566',
            'email' => 'info@biohrana.rs',
        ]);

        Dobavljac::create([
            'naziv' => 'PoljoPromet',
            'kontakt_osoba' => 'Dragan Ilić',
            'adresa' => 'Cara Dušana 45, Kraljevo',
            'telefon' => '0617788990',
            'email' => 'poljopromet@gmail.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'ime' => 'Admin',
            'prezime' => 'Admin',
            'korisnicko_ime' => 'admin',
            'lozinka' => Hash::make('admin123'),
            'uloga' => 'administrator',
        ]);

        User::create([
            'ime' => 'Operater',
            'prezime' => 'Test',
            'korisnicko_ime' => 'operater',
            'lozinka' => Hash::make('operater123'),
            'uloga' => 'operater',
        ]);

        User::create([
            'ime' => 'Menadzer',
            'prezime' => 'Prodaje',
            'korisnicko_ime' => 'menadzer',
            'lozinka' => Hash::make('menadzer123'),
            'uloga' => 'menadzer_prodaje',
        ]);
    }
}

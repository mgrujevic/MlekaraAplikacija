<?php

namespace Tests\Unit;

use App\Models\Dobavljac;
use App\Models\Nabavka;
use App\Models\Sirovina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NabavkaModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_nabavka_belongs_to_dobavljac_and_sirovina(): void
    {
        $dobavljac = Dobavljac::create([
            'naziv' => 'Dobavljac 1',
            'kontakt_osoba' => 'Kontakt osoba 1',
            'adresa' => 'Adresa 1',
            'telefon' => '06542325',
            'email' => 'email@email.com',
        ]);

        $sirovina = Sirovina::create([
            'naziv' => 'Mleko',
            'jedinica_mere' => 'l',
            'kolicina' => '500',
        ]);

        $nabavka = Nabavka::create([
            'dobavljac_id' => $dobavljac->id,
            'sirovina_id' => $sirovina->id,
            'datum' => now(),
            'kolicina' => 10,
            'cena' => 100.50,
        ]);

        $this->assertTrue($nabavka->dobavljac()->is($dobavljac));
        $this->assertTrue($nabavka->sirovina()->is($sirovina));
    }
}

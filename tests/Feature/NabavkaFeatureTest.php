<?php

namespace Tests\Feature;

use App\Models\Dobavljac;
use App\Models\Sirovina;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NabavkaFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_operater_can_store_nabavka_and_menadzer_cannot_access(): void
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

        $operater = User::create([
            'ime' => 'Operater',
            'prezime' => 'Operaterovic',
            'korisnicko_ime' => 'operater',
            'lozinka' => bcrypt('password'),
            'uloga' => 'operater',
        ]);

        $this->actingAs($operater);

        // Operater sme da otvori create
        $this->get(route('operater.nabavke.create'))->assertOk();

        // Operater sme da store (controller za operatera radi back()->with success)
        $payload = [
            'dobavljac_id' => $dobavljac->id,
            'sirovina_id' => $sirovina->id,
            'datum' => now()->toDateTimeString(),
            'kolicina' => 5,
            'cena' => 120.00,
        ];

        $response = $this->post(route('operater.nabavke.store'), $payload);

        $response->assertRedirect(); // back()
        $response->assertSessionHas('success', 'Nabavka je uspešno uneta.');

        $this->assertDatabaseHas('nabavkas', [
            'dobavljac_id' => $dobavljac->id,
            'sirovina_id' => $sirovina->id,
            'kolicina' => 5,
        ]);

        // 3) Menadžer prodaje ne sme ništa oko nabavke (ni operater rute)
        auth()->logout();

        $menadzer = User::create([
            'ime' => 'Menadzer',
            'prezime' => 'Menadzerovic',
            'korisnicko_ime' => 'menadzer_prodaje',
            'lozinka' => bcrypt('password'),
            'uloga' => 'menadzer_prodaje',
        ]);

        $this->actingAs($menadzer);

        $this->get(route('operater.nabavke.create'))->assertForbidden();
        $this->get(route('admin.nabavke.index'))->assertForbidden();
    }
}

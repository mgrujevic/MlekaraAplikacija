<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Proizvod;
use App\Models\SerijaProizvoda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SerijaProizvodaController
 */
final class SerijaProizvodaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $serijaProizvodas = SerijaProizvoda::factory()->count(3)->create();

        $response = $this->get(route('serija-proizvodas.index'));

        $response->assertOk();
        $response->assertViewIs('serijaProizvoda.index');
        $response->assertViewHas('serijaProizvodas', $serijaProizvodas);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('serija-proizvodas.create'));

        $response->assertOk();
        $response->assertViewIs('serijaProizvoda.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SerijaProizvodaController::class,
            'store',
            \App\Http\Requests\SerijaProizvodaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $proizvod = Proizvod::factory()->create();
        $proizvedena_kolicina = fake()->numberBetween(-10000, 10000);
        $datum_proizvodnje = Carbon::parse(fake()->dateTime());

        $response = $this->post(route('serija-proizvodas.store'), [
            'proizvod_id' => $proizvod->id,
            'proizvedena_kolicina' => $proizvedena_kolicina,
            'datum_proizvodnje' => $datum_proizvodnje->toDateTimeString(),
        ]);

        $serijaProizvodas = SerijaProizvoda::query()
            ->where('proizvod_id', $proizvod->id)
            ->where('proizvedena_kolicina', $proizvedena_kolicina)
            ->where('datum_proizvodnje', $datum_proizvodnje)
            ->get();
        $this->assertCount(1, $serijaProizvodas);
        $serijaProizvoda = $serijaProizvodas->first();

        $response->assertRedirect(route('serijaProizvodas.index'));
        $response->assertSessionHas('serijaProizvoda.id', $serijaProizvoda->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $serijaProizvoda = SerijaProizvoda::factory()->create();

        $response = $this->get(route('serija-proizvodas.show', $serijaProizvoda));

        $response->assertOk();
        $response->assertViewIs('serijaProizvoda.show');
        $response->assertViewHas('serijaProizvoda', $serijaProizvoda);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $serijaProizvoda = SerijaProizvoda::factory()->create();

        $response = $this->get(route('serija-proizvodas.edit', $serijaProizvoda));

        $response->assertOk();
        $response->assertViewIs('serijaProizvoda.edit');
        $response->assertViewHas('serijaProizvoda', $serijaProizvoda);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SerijaProizvodaController::class,
            'update',
            \App\Http\Requests\SerijaProizvodaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $serijaProizvoda = SerijaProizvoda::factory()->create();
        $proizvod = Proizvod::factory()->create();
        $proizvedena_kolicina = fake()->numberBetween(-10000, 10000);
        $datum_proizvodnje = Carbon::parse(fake()->dateTime());

        $response = $this->put(route('serija-proizvodas.update', $serijaProizvoda), [
            'proizvod_id' => $proizvod->id,
            'proizvedena_kolicina' => $proizvedena_kolicina,
            'datum_proizvodnje' => $datum_proizvodnje->toDateTimeString(),
        ]);

        $serijaProizvoda->refresh();

        $response->assertRedirect(route('serijaProizvodas.index'));
        $response->assertSessionHas('serijaProizvoda.id', $serijaProizvoda->id);

        $this->assertEquals($proizvod->id, $serijaProizvoda->proizvod_id);
        $this->assertEquals($proizvedena_kolicina, $serijaProizvoda->proizvedena_kolicina);
        $this->assertEquals($datum_proizvodnje, $serijaProizvoda->datum_proizvodnje);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $serijaProizvoda = SerijaProizvoda::factory()->create();

        $response = $this->delete(route('serija-proizvodas.destroy', $serijaProizvoda));

        $response->assertRedirect(route('serijaProizvodas.index'));

        $this->assertModelMissing($serijaProizvoda);
    }
}

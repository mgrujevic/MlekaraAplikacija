<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kupac;
use App\Models\Narudzbina;
use App\Models\Proizvod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NarudzbinaController
 */
final class NarudzbinaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $narudzbinas = Narudzbina::factory()->count(3)->create();

        $response = $this->get(route('narudzbinas.index'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.index');
        $response->assertViewHas('narudzbinas', $narudzbinas);
    }

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('narudzbinas.create'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.create');
    }

    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NarudzbinaController::class,
            'store',
            \App\Http\Requests\NarudzbinaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $proizvod = Proizvod::factory()->create();
        $kupac = Kupac::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $datum = Carbon::parse(fake()->date());
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('narudzbinas.store'), [
            'proizvod_id' => $proizvod->id,
            'kupac_id' => $kupac->id,
            'kolicina' => $kolicina,
            'datum' => $datum->toDateString(),
            'status' => $status,
        ]);

        $narudzbinas = Narudzbina::query()
            ->where('proizvod_id', $proizvod->id)
            ->where('kupac_id', $kupac->id)
            ->where('kolicina', $kolicina)
            ->where('datum', $datum)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $narudzbinas);
        $narudzbina = $narudzbinas->first();

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);
    }

    #[Test]
    public function show_displays_view(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->get(route('narudzbinas.show', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.show');
        $response->assertViewHas('narudzbina', $narudzbina);
    }

    #[Test]
    public function edit_displays_view(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->get(route('narudzbinas.edit', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.edit');
        $response->assertViewHas('narudzbina', $narudzbina);
    }

    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NarudzbinaController::class,
            'update',
            \App\Http\Requests\NarudzbinaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $narudzbina = Narudzbina::factory()->create();
        $proizvod = Proizvod::factory()->create();
        $kupac = Kupac::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $datum = Carbon::parse(fake()->date());
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('narudzbinas.update', $narudzbina), [
            'proizvod_id' => $proizvod->id,
            'kupac_id' => $kupac->id,
            'kolicina' => $kolicina,
            'datum' => $datum->toDateString(),
            'status' => $status,
        ]);

        $narudzbina->refresh();

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);

        $this->assertEquals($proizvod->id, $narudzbina->proizvod_id);
        $this->assertEquals($kupac->id, $narudzbina->kupac_id);
        $this->assertEquals($kolicina, $narudzbina->kolicina);
        $this->assertEquals($datum, $narudzbina->datum);
        $this->assertEquals($status, $narudzbina->status);
    }

    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->delete(route('narudzbinas.destroy', $narudzbina));

        $response->assertRedirect(route('narudzbinas.index'));

        $this->assertModelMissing($narudzbina);
    }
}

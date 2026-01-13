<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sirovina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SirovinaController
 */
final class SirovinaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $sirovinas = Sirovina::factory()->count(3)->create();

        $response = $this->get(route('sirovinas.index'));

        $response->assertOk();
        $response->assertViewIs('sirovina.index');
        $response->assertViewHas('sirovinas', $sirovinas);
    }

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('sirovinas.create'));

        $response->assertOk();
        $response->assertViewIs('sirovina.create');
    }

    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SirovinaController::class,
            'store',
            \App\Http\Requests\SirovinaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $naziv = fake()->word();
        $jedinica_mere = fake()->randomElement(/** enum_attributes **/);
        $kolicina = fake()->numberBetween(-10000, 10000);

        $response = $this->post(route('sirovinas.store'), [
            'naziv' => $naziv,
            'jedinica_mere' => $jedinica_mere,
            'kolicina' => $kolicina,
        ]);

        $sirovinas = Sirovina::query()
            ->where('naziv', $naziv)
            ->where('jedinica_mere', $jedinica_mere)
            ->where('kolicina', $kolicina)
            ->get();
        $this->assertCount(1, $sirovinas);
        $sirovina = $sirovinas->first();

        $response->assertRedirect(route('sirovinas.index'));
        $response->assertSessionHas('sirovina.id', $sirovina->id);
    }

    #[Test]
    public function show_displays_view(): void
    {
        $sirovina = Sirovina::factory()->create();

        $response = $this->get(route('sirovinas.show', $sirovina));

        $response->assertOk();
        $response->assertViewIs('sirovina.show');
        $response->assertViewHas('sirovina', $sirovina);
    }

    #[Test]
    public function edit_displays_view(): void
    {
        $sirovina = Sirovina::factory()->create();

        $response = $this->get(route('sirovinas.edit', $sirovina));

        $response->assertOk();
        $response->assertViewIs('sirovina.edit');
        $response->assertViewHas('sirovina', $sirovina);
    }

    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SirovinaController::class,
            'update',
            \App\Http\Requests\SirovinaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $sirovina = Sirovina::factory()->create();
        $naziv = fake()->word();
        $jedinica_mere = fake()->randomElement(/** enum_attributes **/);
        $kolicina = fake()->numberBetween(-10000, 10000);

        $response = $this->put(route('sirovinas.update', $sirovina), [
            'naziv' => $naziv,
            'jedinica_mere' => $jedinica_mere,
            'kolicina' => $kolicina,
        ]);

        $sirovina->refresh();

        $response->assertRedirect(route('sirovinas.index'));
        $response->assertSessionHas('sirovina.id', $sirovina->id);

        $this->assertEquals($naziv, $sirovina->naziv);
        $this->assertEquals($jedinica_mere, $sirovina->jedinica_mere);
        $this->assertEquals($kolicina, $sirovina->kolicina);
    }

    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $sirovina = Sirovina::factory()->create();

        $response = $this->delete(route('sirovinas.destroy', $sirovina));

        $response->assertRedirect(route('sirovinas.index'));

        $this->assertModelMissing($sirovina);
    }
}

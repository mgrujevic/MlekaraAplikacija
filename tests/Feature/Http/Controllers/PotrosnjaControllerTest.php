<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Potrosnja;
use App\Models\SerijaProizvoda;
use App\Models\Sirovina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PotrosnjaController
 */
final class PotrosnjaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $potrosnjas = Potrosnja::factory()->count(3)->create();

        $response = $this->get(route('potrosnjas.index'));

        $response->assertOk();
        $response->assertViewIs('potrosnja.index');
        $response->assertViewHas('potrosnjas', $potrosnjas);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('potrosnjas.create'));

        $response->assertOk();
        $response->assertViewIs('potrosnja.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PotrosnjaController::class,
            'store',
            \App\Http\Requests\PotrosnjaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $serija_proizvoda = SerijaProizvoda::factory()->create();
        $sirovina = Sirovina::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);

        $response = $this->post(route('potrosnjas.store'), [
            'serija_proizvoda_id' => $serija_proizvoda->id,
            'sirovina_id' => $sirovina->id,
            'kolicina' => $kolicina,
        ]);

        $potrosnjas = Potrosnja::query()
            ->where('serija_proizvoda_id', $serija_proizvoda->id)
            ->where('sirovina_id', $sirovina->id)
            ->where('kolicina', $kolicina)
            ->get();
        $this->assertCount(1, $potrosnjas);
        $potrosnja = $potrosnjas->first();

        $response->assertRedirect(route('potrosnjas.index'));
        $response->assertSessionHas('potrosnja.id', $potrosnja->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $potrosnja = Potrosnja::factory()->create();

        $response = $this->get(route('potrosnjas.show', $potrosnja));

        $response->assertOk();
        $response->assertViewIs('potrosnja.show');
        $response->assertViewHas('potrosnja', $potrosnja);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $potrosnja = Potrosnja::factory()->create();

        $response = $this->get(route('potrosnjas.edit', $potrosnja));

        $response->assertOk();
        $response->assertViewIs('potrosnja.edit');
        $response->assertViewHas('potrosnja', $potrosnja);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PotrosnjaController::class,
            'update',
            \App\Http\Requests\PotrosnjaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $potrosnja = Potrosnja::factory()->create();
        $serija_proizvoda = SerijaProizvoda::factory()->create();
        $sirovina = Sirovina::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);

        $response = $this->put(route('potrosnjas.update', $potrosnja), [
            'serija_proizvoda_id' => $serija_proizvoda->id,
            'sirovina_id' => $sirovina->id,
            'kolicina' => $kolicina,
        ]);

        $potrosnja->refresh();

        $response->assertRedirect(route('potrosnjas.index'));
        $response->assertSessionHas('potrosnja.id', $potrosnja->id);

        $this->assertEquals($serija_proizvoda->id, $potrosnja->serija_proizvoda_id);
        $this->assertEquals($sirovina->id, $potrosnja->sirovina_id);
        $this->assertEquals($kolicina, $potrosnja->kolicina);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $potrosnja = Potrosnja::factory()->create();

        $response = $this->delete(route('potrosnjas.destroy', $potrosnja));

        $response->assertRedirect(route('potrosnjas.index'));

        $this->assertModelMissing($potrosnja);
    }
}

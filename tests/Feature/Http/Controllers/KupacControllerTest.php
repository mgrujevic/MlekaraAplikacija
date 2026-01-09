<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kupac;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\KupacController
 */
final class KupacControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $kupacs = Kupac::factory()->count(3)->create();

        $response = $this->get(route('kupacs.index'));

        $response->assertOk();
        $response->assertViewIs('kupac.index');
        $response->assertViewHas('kupacs', $kupacs);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('kupacs.create'));

        $response->assertOk();
        $response->assertViewIs('kupac.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KupacController::class,
            'store',
            \App\Http\Requests\KupacStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $naziv = fake()->word();

        $response = $this->post(route('kupacs.store'), [
            'naziv' => $naziv,
        ]);

        $kupacs = Kupac::query()
            ->where('naziv', $naziv)
            ->get();
        $this->assertCount(1, $kupacs);
        $kupac = $kupacs->first();

        $response->assertRedirect(route('kupacs.index'));
        $response->assertSessionHas('kupac.id', $kupac->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $kupac = Kupac::factory()->create();

        $response = $this->get(route('kupacs.show', $kupac));

        $response->assertOk();
        $response->assertViewIs('kupac.show');
        $response->assertViewHas('kupac', $kupac);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $kupac = Kupac::factory()->create();

        $response = $this->get(route('kupacs.edit', $kupac));

        $response->assertOk();
        $response->assertViewIs('kupac.edit');
        $response->assertViewHas('kupac', $kupac);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KupacController::class,
            'update',
            \App\Http\Requests\KupacUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $kupac = Kupac::factory()->create();
        $naziv = fake()->word();

        $response = $this->put(route('kupacs.update', $kupac), [
            'naziv' => $naziv,
        ]);

        $kupac->refresh();

        $response->assertRedirect(route('kupacs.index'));
        $response->assertSessionHas('kupac.id', $kupac->id);

        $this->assertEquals($naziv, $kupac->naziv);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $kupac = Kupac::factory()->create();

        $response = $this->delete(route('kupacs.destroy', $kupac));

        $response->assertRedirect(route('kupacs.index'));

        $this->assertModelMissing($kupac);
    }
}

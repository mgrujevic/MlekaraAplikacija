<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserController
 */
final class UserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertOk();
        $response->assertViewIs('user.index');
        $response->assertViewHas('users', $users);
    }

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('users.create'));

        $response->assertOk();
        $response->assertViewIs('user.create');
    }

    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserController::class,
            'store',
            \App\Http\Requests\UserStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $ime = fake()->word();
        $prezime = fake()->word();
        $korisnicko_ime = fake()->word();
        $uloga = fake()->randomElement(/** enum_attributes **/);
        $lozinka = fake()->word();

        $response = $this->post(route('users.store'), [
            'ime' => $ime,
            'prezime' => $prezime,
            'korisnicko_ime' => $korisnicko_ime,
            'uloga' => $uloga,
            'lozinka' => $lozinka,
        ]);

        $users = User::query()
            ->where('ime', $ime)
            ->where('prezime', $prezime)
            ->where('korisnicko_ime', $korisnicko_ime)
            ->where('uloga', $uloga)
            ->where('lozinka', $lozinka)
            ->get();
        $this->assertCount(1, $users);
        $user = $users->first();

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('user.id', $user->id);
    }

    #[Test]
    public function show_displays_view(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user));

        $response->assertOk();
        $response->assertViewIs('user.show');
        $response->assertViewHas('user', $user);
    }

    #[Test]
    public function edit_displays_view(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response->assertOk();
        $response->assertViewIs('user.edit');
        $response->assertViewHas('user', $user);
    }

    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserController::class,
            'update',
            \App\Http\Requests\UserUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $user = User::factory()->create();
        $ime = fake()->word();
        $prezime = fake()->word();
        $korisnicko_ime = fake()->word();
        $uloga = fake()->randomElement(/** enum_attributes **/);
        $lozinka = fake()->word();

        $response = $this->put(route('users.update', $user), [
            'ime' => $ime,
            'prezime' => $prezime,
            'korisnicko_ime' => $korisnicko_ime,
            'uloga' => $uloga,
            'lozinka' => $lozinka,
        ]);

        $user->refresh();

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('user.id', $user->id);

        $this->assertEquals($ime, $user->ime);
        $this->assertEquals($prezime, $user->prezime);
        $this->assertEquals($korisnicko_ime, $user->korisnicko_ime);
        $this->assertEquals($uloga, $user->uloga);
        $this->assertEquals($lozinka, $user->lozinka);
    }

    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));

        $this->assertModelMissing($user);
    }
}

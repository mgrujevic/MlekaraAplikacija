@extends('layouts.app')

@section('title', 'Izmena korisnika')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Izmena korisnika</h1>
    <form method="POST" action="{{ route('admin.korisnici.update', $user) }}">
        @csrf
        @method('PUT')

        {{-- Ime --}}
        <div class="mb-4">
            <label class="block mb-1">Ime</label>
            <input
                type="text"
                name="ime"
                value="{{ old('ime', $user->ime) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Prezime --}}
        <div class="mb-4">
            <label class="block mb-1">Prezime</label>
            <input
                type="text"
                name="prezime"
                value="{{ old('prezime', $user->prezime) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Korisničko ime --}}
        <div class="mb-4">
            <label class="block mb-1">Korisničko ime</label>
            <input
                type="text"
                name="korisnicko_ime"
                value="{{ old('korisnicko_ime', $user->korisnicko_ime) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Lozinka (opciono) --}}
        <div class="mb-4">
            <label class="block mb-1">Nova lozinka</label>
            <input
                type="password"
                name="lozinka"
                class="w-full border px-3 py-2 rounded"
                placeholder="Ostaviti prazno ako se ne menja"
            >
        </div>

        {{-- Uloga --}}
        <div class="mb-6">
            <label class="block mb-1">Uloga</label>
            <select name="uloga" class="w-full border px-3 py-2 rounded" required>
                <option value="administrator" @selected($user->uloga === 'administrator')>
                    Administrator
                </option>
                <option value="operater" @selected($user->uloga === 'operater')>
                    Operater
                </option>
                <option value="menadzer_prodaje" @selected($user->uloga === 'menadzer_prodaje')>
                    Menadžer prodaje
                </option>
            </select>
        </div>

        {{-- Dugmad --}}
        <div class="flex gap-4">
            <button type="submit"
                    class="px-4 py-2 border rounded hover:bg-gray-100">
                Sačuvaj izmene
            </button>

            <a href="{{ route('admin.korisnici.index') }}"
               class="px-4 py-2 border rounded hover:bg-gray-100">
                Nazad
            </a>
        </div>

    </form>

</div>
@endsection

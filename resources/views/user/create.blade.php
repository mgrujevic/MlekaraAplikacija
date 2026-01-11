@extends('layouts.app')

@section('title', 'Dodaj korisnika')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Dodaj korisnika</h1>

    {{-- Prikaz validacionih grešaka --}}
    @if ($errors->any())
        <div class="mb-4 p-3 border rounded bg-red-50 text-red-700">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.korisnici.store') }}">
        @csrf

        {{-- Ime --}}
        <div class="mb-4">
            <label class="block mb-1">Ime</label>
            <input
                type="text"
                name="ime"
                value="{{ old('ime') }}"
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
                value="{{ old('prezime') }}"
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
                value="{{ old('korisnicko_ime') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Lozinka --}}
        <div class="mb-4">
            <label class="block mb-1">Lozinka</label>
            <input
                type="password"
                name="lozinka"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Uloga --}}
        <div class="mb-6">
            <label class="block mb-1">Uloga</label>
            <select name="uloga" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- izaberi --</option>
                <option value="administrator" @selected(old('uloga') === 'administrator')>
                    Administrator
                </option>
                <option value="operater" @selected(old('uloga') === 'operater')>
                    Operater
                </option>
                <option value="menadzer_prodaje" @selected(old('uloga') === 'menadzer_prodaje')>
                    Menadžer prodaje
                </option>
            </select>
        </div>

        {{-- Dugmad --}}
        <div class="flex gap-4">
            <button type="submit"
                    class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                Sačuvaj
            </button>

            <a href="{{ route('admin.korisnici.index') }}"
               class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                Nazad
            </a>
        </div>

    </form>

</div>
@endsection

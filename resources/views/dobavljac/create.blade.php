@extends('layouts.app')

@section('title', 'Dodaj dobavljača')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Dodaj dobavljača</h1>

    {{-- Validacione greške --}}
    @if ($errors->any())
        <div class="mb-4 p-3 border rounded bg-red-50 text-red-700">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.dobavljaci.store') }}">
        @csrf

        {{-- Naziv --}}
        <div class="mb-4">
            <label class="block mb-1">Naziv</label>
            <input
                type="text"
                name="naziv"
                value="{{ old('naziv') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Kontakt osoba --}}
        <div class="mb-4">
            <label class="block mb-1">Kontakt osoba</label>
            <input
                type="text"
                name="kontakt_osoba"
                value="{{ old('kontakt osoba') }}"
                class="w-full border px-3 py-2 rounded"
            >
        </div>

        {{-- Adresa --}}
        <div class="mb-4">
            <label class="block mb-1">Adresa</label>
            <input
                type="text"
                name="adresa"
                value="{{ old('adresa') }}"
                class="w-full border px-3 py-2 rounded"
            >
        </div>

        {{-- Telefon --}}
        <div class="mb-4">
            <label class="block mb-1">Telefon</label>
            <input
                type="text"
                name="telefon"
                value="{{ old('telefon') }}"
                class="w-full border px-3 py-2 rounded"
            >
        </div>

        {{-- Email --}}
        <div class="mb-6">
            <label class="block mb-1">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full border px-3 py-2 rounded"
            >
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

            <a href="{{ route('admin.dobavljaci.index') }}"
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

@extends('layouts.app')

@section('title', 'Dodaj kupca')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Dodaj kupca</h1>

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

    <form method="POST" action="{{ route('admin.kupci.store') }}">
        @csrf

        {{-- Ime --}}
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

        {{-- Prezime --}}
        <div class="mb-4">
            <label class="block mb-1">Adresa</label>
            <input
                type="text"
                name="adresa"
                value="{{ old('adresa') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Telefon --}}
        <div class="mb-4">
            <label class="block mb-1">Telefon</label>
            <input
                type="text"
                name="kontakt_telefon"
                value="{{ old('telefon') }}"
                class="w-full border px-3 py-2 rounded"
                required
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
            <button type="submit" class="px-4 py-2 border rounded hover:bg-gray-100">
                Sačuvaj
            </button>

            <a href="{{ route('admin.kupci.index') }}"
               class="px-4 py-2 border rounded hover:bg-gray-100">
                Nazad
            </a>
        </div>

    </form>

</div>
@endsection

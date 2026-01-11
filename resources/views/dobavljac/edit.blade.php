@extends('layouts.app')

@section('title')
    Izmena dobavljača {{ $dobavljac->naziv }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena dobavljača</h1>

        {{-- Nazad --}}
        <a href="{{ url()->previous() }}"
           class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
            Nazad
        </a>
    </div>

    {{-- Forma --}}
    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route('admin.dobavljaci.update', $dobavljac) }}">
            @csrf
            @method('PUT')

            {{-- Naziv --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Naziv</label>
                <input
                    type="text"
                    name="naziv"
                    value="{{ old('naziv', $dobavljac->naziv) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('naziv')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kontakt osoba --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Kontakt osoba</label>
                <input
                    type="text"
                    name="kontakt_osoba"
                    value="{{ old('kontakt_osoba', $dobavljac->kontakt_osoba) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('kontakt_osoba')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Adresa --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Adresa</label>
                <input
                    type="text"
                    name="adresa"
                    value="{{ old('adresa', $dobavljac->adresa) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('adresa')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Telefon --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Telefon</label>
                <input
                    type="text"
                    name="telefon"
                    value="{{ old('telefon', $dobavljac->telefon) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('telefon')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-6">
                <label class="block mb-1 font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $dobavljac->email) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dugmad --}}
            <div class="flex gap-4">
                <button
                    type="submit"
                    class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Sačuvaj izmene
                </button>

                <a href="{{ route('admin.dobavljaci.index') }}"
                   class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Nazad na listu
                </a>
            </div>

        </form>
    </div>
</div>
@endsection

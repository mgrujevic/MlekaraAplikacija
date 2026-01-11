@extends('layouts.app')

@section('title')
    Izmena kupca {{ $kupac->naziv }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena kupca</h1>
    </div>

    {{-- Forma --}}
    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route($prefix.'kupci.update', $kupac) }}">
            @csrf
            @method('PUT')

            {{-- Naziv --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Naziv</label>
                <input
                    type="text"
                    name="naziv"
                    value="{{ old('naziv', $kupac->naziv) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('naziv')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Adresa --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Adresa</label>
                <input
                    type="text"
                    name="adresa"
                    value="{{ old('adresa', $kupac->adresa) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('adresa')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kontakt telefon --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Kontakt telefon</label>
                <input
                    type="text"
                    name="kontakt_telefon"
                    value="{{ old('kontakt_telefon', $kupac->kontakt_telefon) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('kontakt_telefon')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-6">
                <label class="block mb-1 font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $kupac->email) }}"
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
                    class="px-4 py-2 border-2 border-gray-300 rounded-lg
                           bg-slate-50 text-slate-700
                           hover:bg-slate-100 hover:border-gray-400 hover:text-slate-900
                           shadow-sm transition-all duration-200">
                    Sačuvaj izmene
                </button>

                <a href="{{ route($prefix.'kupci.index') }}"
                   class="px-4 py-2 border-2 border-gray-300 rounded-lg
                          bg-slate-50 text-slate-700
                          hover:bg-slate-100 hover:border-gray-400 hover:text-slate-900
                          shadow-sm transition-all duration-200">
                    Nazad na listu
                </a>
            </div>

        </form>
    </div>
</div>
@endsection


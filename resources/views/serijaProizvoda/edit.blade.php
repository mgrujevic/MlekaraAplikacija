@extends('layouts.app')

@section('title')
    Izmena serije proizvoda #{{ $serijaProizvoda->id }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena serije proizvoda</h1>
    </div>

    {{-- Forma --}}
    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route('admin.serije-proizvoda.update', $serijaProizvoda) }}">
            @csrf
            @method('PUT')

            {{-- Proizvod --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Proizvod</label>
                <select
                    name="proizvod_id"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                    required
                >
                    <option value="">-- Izaberi proizvod --</option>
                    @foreach($proizvodi as $proizvod)
                        <option
                            value="{{ $proizvod->id }}"
                            {{ (string)old('proizvod_id', $serijaProizvoda->proizvod_id) === (string)$proizvod->id ? 'selected' : '' }}
                        >
                            {{ $proizvod->naziv }}
                        </option>
                    @endforeach
                </select>

                @error('proizvod_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Datum proizvodnje --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Datum proizvodnje</label>
                <input
                    type="date"
                    name="datum_proizvodnje"
                    value="{{ old('datum_proizvodnje', optional($serijaProizvoda->datum_proizvodnje)->format('Y-m-d')) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >

                @error('datum_proizvodnje')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Količina --}}
            <div class="mb-6">
                <label class="block mb-1 font-medium">Količina</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="proizvedena_kolicina"
                    value="{{ old('proizvedena_kolicina', $serijaProizvoda->proizvedena_kolicina) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >

                @error('proizvedena_kolicina')
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

                <a href="{{ route('admin.serije-proizvoda.index') }}"
                   class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Nazad na listu
                </a>
            </div>

        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
    Izmena nabavke {{ $nabavka->sirovina->naziv }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena nabavke</h1>

    </div>

    {{-- Forma --}}
    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route('admin.nabavke.update', $nabavka) }}">
            @csrf
            @method('PUT')

            {{-- Sirovina --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Sirovina</label>
                <select
                    name="sirovina_id"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                    required
                >
                    <option value="">-- Izaberi sirovinu --</option>
                    @foreach($sirovine as $sirovina)
                        <option
                            value="{{ $sirovina->id }}"
                            {{ (string)old('sirovina_id', $nabavka->sirovina_id) === (string)$sirovina->id ? 'selected' : '' }}
                        >
                            {{ $sirovina->naziv }}
                        </option>
                    @endforeach
                </select>

                @error('sirovina_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dobavljač --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Dobavljač</label>
                <select
                    name="dobavljac_id"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                    required
                >
                    <option value="">-- Izaberi dobavljača --</option>
                    @foreach($dobavljaci as $dobavljac)
                        <option
                            value="{{ $dobavljac->id }}"
                            {{ (string)old('dobavljac_id', $nabavka->dobavljac_id) === (string)$dobavljac->id ? 'selected' : '' }}
                        >
                            {{ $dobavljac->naziv }}
                        </option>
                    @endforeach
                </select>

                @error('dobavljac_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Datum --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Datum</label>
                <input
                    type="date"
                    name="datum"
                    value="{{ old('datum', optional($nabavka->datum)->format('Y-m-d')) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >

                @error('datum')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ukupna količina --}}
            <div class="mb-6">
                <label class="block mb-1 font-medium">Količina</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="kolicina"
                    value="{{ old('kolicina', $nabavka->kolicina) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >

                @error('ukupna_kolicina')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Cena</label>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="cena"
                    value="{{ old('cena', $nabavka->cena) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >

                @error('cena')
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

                <a href="{{ route('admin.nabavke.index') }}"
                   class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Nazad na listu
                </a>
            </div>

        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
    Izmena sirovine {{ $sirovina->naziv }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena sirovine</h1>
    </div>

    {{-- Forma --}}
    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route('admin.sirovine.update', $sirovina) }}">
            @csrf
            @method('PUT')

            {{-- Naziv --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Naziv</label>
                <input
                    type="text"
                    name="naziv"
                    value="{{ old('naziv', $sirovina->naziv) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('naziv')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jedinica mere --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Jedinica mere</label>
                <select
                    name="jedinica_mere"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                    required>
                    <option value="">-- Izaberi jedinicu mere --</option>

                    <option value="kg"
                        {{ old('jedinica_mere', $sirovina->jedinica_mere) === 'kg' ? 'selected' : '' }}>
                        kg
                    </option>

                    <option value="l"
                        {{ old('jedinica_mere', $sirovina->jedinica_mere) === 'l' ? 'selected' : '' }}>
                        l
                    </option>

                    <option value="kom"
                        {{ old('jedinica_mere', $sirovina->jedinica_mere) === 'kom' ? 'selected' : '' }}>
                        kom
                    </option>
                </select>

                @error('jedinica_mere')
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
                    name="kolicina"
                    value="{{ old('kolicina', $sirovina->kolicina) }}"
                    class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                    required
                >
                @error('kolicina')
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

                <a href="{{ route('admin.sirovine.index') }}"
                   class="px-4 py-2 border-2 border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Nazad na listu
                </a>
            </div>

        </form>
    </div>
</div>
@endsection

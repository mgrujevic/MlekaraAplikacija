@extends('layouts.app')

@section('title')
    Izmena narudžbine #{{ $narudzbina->id }}
@endsection

@section('content')
<div class="max-w-xl mx-auto py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Izmena narudžbine</h1>

        <a href="{{ url()->previous() }}"
           class="px-4 py-2 border-2 border-gray-300 rounded-lg
                  bg-slate-50 text-slate-700
                  hover:bg-slate-100 hover:border-gray-400 hover:text-slate-900
                  shadow-sm transition-all duration-200">
            Nazad
        </a>
    </div>

    <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
        <form method="POST" action="{{ route($prefix.'narudzbine.update', $narudzbina) }}">
            @csrf
            @method('PUT')

            {{-- Proizvod --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Proizvod</label>
                <select name="proizvod_id"
                        class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                        required>
                    <option value="">-- Izaberi proizvod --</option>
                    @foreach($proizvodi as $proizvod)
                        <option value="{{ $proizvod->id }}"
                            {{ (string)old('proizvod_id', $narudzbina->proizvod_id) === (string)$proizvod->id ? 'selected' : '' }}>
                            {{ $proizvod->naziv }}
                        </option>
                    @endforeach
                </select>
                @error('proizvod_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kupac --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Kupac</label>
                <select name="kupac_id"
                        class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg bg-white"
                        required>
                    <option value="">-- Izaberi kupca --</option>
                    @foreach($kupci as $kupac)
                        <option value="{{ $kupac->id }}"
                            {{ (string)old('kupac_id', $narudzbina->kupac_id) === (string)$kupac->id ? 'selected' : '' }}>
                            {{ $kupac->naziv }}
                        </option>
                    @endforeach
                </select>
                @error('kupac_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Količina --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Količina</label>
                <input type="number" step="0.01" min="0"
                       name="kolicina"
                       value="{{ old('kolicina', $narudzbina->kolicina) }}"
                       class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                       required>
                @error('kolicina')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Datum --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Datum</label>
                <input type="date"
                       name="datum"
                       value="{{ old('datum', optional($narudzbina->datum)->format('Y-m-d')) }}"
                       class="w-full border-2 border-gray-300 px-3 py-2 rounded-lg"
                       required>
                @error('datum')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="block mb-1">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded" required>
                    <option value="kreirana"
                        @selected(old('status', $narudzbina->status) === 'kreirana')>
                        Kreirana
                    </option>

                    <option value="u_obradi"
                        @selected(old('status', $narudzbina->status) === 'u_obradi')>
                        U obradi
                    </option>

                    <option value="isporucena"
                        @selected(old('status', $narudzbina->status) === 'isporucena')>
                        Isporučena
                    </option>

                    <option value="otkazana"
                        @selected(old('status', $narudzbina->status) === 'otkazana')>
                        Otkazana
                    </option>
                </select>

                @error('status')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Dugmad --}}
            <div class="flex gap-4">
                <button type="submit"
                        class="px-4 py-2 border-2 border-gray-300 rounded-lg
                               bg-slate-50 text-slate-700
                               hover:bg-slate-100 hover:border-gray-400 hover:text-slate-900
                               shadow-sm transition-all duration-200">
                    Sačuvaj izmene
                </button>

                <a href="{{ route($prefix.'narudzbine.index') }}"
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

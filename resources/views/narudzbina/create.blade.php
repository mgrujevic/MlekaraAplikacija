@extends('layouts.app')

@section('title', 'Nova narudžbina')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Nova narudžbina</h1>

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

    <form method="POST" action="{{ route('admin.narudzbine.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Proizvod</label>
            <select name="proizvod_id"
                    class="w-full border px-3 py-2 rounded"
                    required>
                <option value="">-- izaberi proizvod --</option>
                @foreach($proizvods as $proizvod)
                    <option value="{{ $proizvod->id }}" @selected(old('proizvod_id') == $proizvod->id)>
                        {{ $proizvod->naziv }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- Kupac --}}
        <div class="mb-4">
            <label class="block mb-1">Kupac</label>
            <select name="kupac_id"
                    class="w-full border px-3 py-2 rounded"
                    required>
                <option value="">-- izaberi kupca --</option>
                @foreach($kupacs as $kupac)
                    <option value="{{ $kupac->id }}" @selected(old('kupac_id') == $kupac->id)>
                        {{ $kupac->naziv }} {{ $kupac->adresa }}
                    </option>
                @endforeach
            </select>
        </div>

         {{-- Kolicina --}}
        <div class="mb-4">
            <label class="block mb-1">Kolicina</label>
            <input
                type="number"
                name="kolicina"
                value="{{ old('kolicina') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Datum --}}
        <div class="mb-4">
            <label class="block mb-1">Datum</label>
            <input
                type="date"
                name="datum"
                value="{{ old('datum', date('Y-m-d')) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Status --}}
        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded" required>
                <option value="nova" @selected(old('status', 'nova') === 'nova')>Nova</option>
                <option value="u_obradi" @selected(old('status') === 'u_obradi')>U obradi</option>
                <option value="zavrsena" @selected(old('status') === 'zavrsena')>Završena</option>
                <option value="otkazana" @selected(old('status') === 'otkazana')>Otkazana</option>
            </select>
        </div>
        
        {{-- Dugmad --}}
        <div class="flex gap-4">
            <button type="submit" class="px-4 py-2 border rounded hover:bg-gray-100">
                Sačuvaj
            </button>

            <a href="{{ route('admin.narudzbine.index') }}"
               class="px-4 py-2 border rounded hover:bg-gray-100">
                Nazad
            </a>
        </div>

    </form>

</div>
@endsection

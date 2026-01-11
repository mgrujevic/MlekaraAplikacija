@extends('layouts.app')

@section('title', 'Nova serija proizvoda')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Nova serija proizvoda</h1>

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

    <form method="POST" action="{{ route($prefix . 'serije-proizvoda.store') }}">
        @csrf

        {{-- Proizvod --}}
        <div class="mb-4">
            <label class="block mb-1">Proizvod</label>
            <select name="proizvod_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- izaberi proizvod --</option>
                @foreach($proizvodi as $proizvod)
                    <option value="{{ $proizvod->id }}" @selected(old('proizvod_id') == $proizvod->id)>
                        {{ $proizvod->naziv ?? ('Proizvod #' . $proizvod->id) }}
                    </option>
                @endforeach
            </select>
        </div>
        

        {{-- Datum proizvodnje --}}
        <div class="mb-4">
            <label class="block mb-1">Datum proizvodnje</label>
            <input
                type="date"
                name="datum_proizvodnje"
                value="{{ old('datum_proizvodnje', date('Y-m-d')) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Proizvedena količina --}}
        <div class="mb-6">
            <label class="block mb-1">Proizvedena količina</label>
            <input
                type="number"
                step="0.01"
                name="proizvedena_kolicina"
                value="{{ old('proizvedena_kolicina') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Dugmad --}}
        <div class="flex gap-4">
            <button type="submit" class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                Sačuvaj
            </button>

            @if(auth()->user()->uloga === 'operater')
                <a href="{{ route('operater.operater-meni') }}"
                class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                    Nazad
                </a>
            @else
                <a href="{{ route('admin.serije-proizvoda.index') }}"
                class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                    Nazad
                </a>
            @endif

        </div>

    </form>

</div>
@endsection

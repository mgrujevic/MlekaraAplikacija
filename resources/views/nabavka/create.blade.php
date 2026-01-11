@extends('layouts.app')

@section('title', 'Nova nabavka')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Nova nabavka</h1>

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

    <form method="POST" action="{{ route($prefix . 'nabavke.store') }}">
        @csrf

        {{-- Dobavljač --}}
        <div class="mb-4">
            <label class="block mb-1">Dobavljač</label>
            <select name="dobavljac_id"
                    class="w-full border px-3 py-2 rounded"
                    required>
                <option value="">-- izaberi dobavljača --</option>
                @foreach($dobavljaci as $dobavljac)
                    <option value="{{ $dobavljac->id }}"
                        @selected(old('dobavljac_id') == $dobavljac->id)>
                        {{ $dobavljac->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sirovina --}}
        <div class="mb-4">
            <label class="block mb-1">Sirovina</label>
            <select name="sirovina_id"
                    class="w-full border px-3 py-2 rounded"
                    required>
                <option value="">-- izaberi sirovinu --</option>
                @foreach($sirovine as $sirovina)
                    <option value="{{ $sirovina->id }}"
                        @selected(old('sirovina_id') == $sirovina->id)>
                        {{ $sirovina->naziv }}
                        ({{ $sirovina->jedinica_mere }})
                    </option>
                @endforeach
            </select>
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

        {{-- Količina --}}
        <div class="mb-4">
            <label class="block mb-1">Količina</label>
            <input
                type="number"
                step="0.01"
                name="kolicina"
                value="{{ old('kolicina') }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Cena --}}
        <div class="mb-6">
            <label class="block mb-1">Cena</label>
            <input
                type="number"
                step="0.01"
                name="cena"
                value="{{ old('cena') }}"
                class="w-full border px-3 py-2 rounded"
                required
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

            @if(auth()->user()->uloga === 'operater')
                <a href="{{ route('operater.operater-meni') }}"
                class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
                    Nazad
                </a>
            @else
                <a href="{{ route('admin.nabavke.index') }}"
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

@extends('layouts.app')

@section('title', 'Dodaj sirovinu')

@section('content')
<div class="max-w-xl mx-auto py-6">

    <h1 class="text-3xl font-semibold mb-6">Dodaj sirovinu</h1>

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

    <form method="POST" action="{{ route('admin.sirovine.store') }}">
        @csrf

        {{-- Naziv --}}
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

        {{-- Jedinica mere --}}
        <div class="mb-4">
            <label class="block mb-1">Jedinica mere</label>
            <input
                type="text"
                name="jedinica_mere"
                value="{{ old('jedinica_mere') }}"
                class="w-full border px-3 py-2 rounded"
                placeholder="npr. litri, kg"
                required
            >
        </div>

        {{-- Početna količina --}}
        <div class="mb-6">
            <label class="block mb-1">Količina</label>
            <input
                type="number"
                step="0.01"
                name="kolicina"
                value="{{ old('kolicina', 0) }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        {{-- Dugmad --}}
        <div class="flex gap-4">
            <button type="submit"
                    class="px-4 py-2 border rounded hover:bg-gray-100">
                Sačuvaj
            </button>

            <a href="{{ route('admin.sirovine.index') }}"
               class="px-4 py-2 border rounded hover:bg-gray-100">
                Nazad
            </a>
        </div>
    </form>

</div>
@endsection

@extends('layouts.app')

@section('title', 'Dobavljači')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Naslov + dugme --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Dobavljači</h1>

        <a href="{{ route('admin.dobavljaci.create') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            + Dodaj dobavljača
        </a>
    </div>

    {{-- Flash poruka --}}
    @if(session('success'))
        <div class="mb-4 p-3 border rounded bg-green-50 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabela --}}
    <div class="bg-white border rounded">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">ID</th>
                    <th class="border px-3 py-2 text-left">Naziv</th>
                    <th class="border px-3 py-2 text-left">Kontakt osoba</th>
                    <th class="border px-3 py-2 text-left">Adresa</th>                    
                    <th class="border px-3 py-2 text-left">Telefon</th>
                    <th class="border px-3 py-2 text-left">Email</th>
                    <th class="border px-3 py-2 text-left">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dobavljacs as $dobavljac)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2">{{ $dobavljac->id }}</td>
                        <td class="border px-3 py-2">{{ $dobavljac->naziv }}</td>
                        <td class="border px-3 py-2">{{ $dobavljac->kontakt_osoba }}</td>
                        <td class="border px-3 py-2">{{ $dobavljac->adresa }}</td>
                        <td class="border px-3 py-2">{{ $dobavljac->telefon }}</td>
                        <td class="border px-3 py-2">{{ $dobavljac->email }}</td>
                        <td class="border px-3 py-2">
                            <div class="flex gap-3">

                                <a href="{{ route('admin.dobavljaci.edit', $dobavljac) }}"
                                   class="text-blue-600 hover:underline">
                                    Izmeni
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.dobavljaci.destroy', $dobavljac) }}"
                                      onsubmit="return confirm('Da li ste sigurni?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline">
                                        Obriši
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-3 py-4 text-center text-gray-500">
                            Nema unetih dobavljača.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Nazad --}}
    <div class="mt-6">
        <a href="{{ route('admin.prijem-podmeni') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            Nazad na meni
        </a>
    </div>

</div>
@endsection

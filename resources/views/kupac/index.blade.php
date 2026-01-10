@extends('layouts.app')

@section('title', 'Kupci')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Naslov + dugme --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Kupci</h1>

        <a href="{{ route($prefix . 'kupci.create') }}"
           class="px-4 py-2 border rounded hover:bg-gray-100">
            + Dodaj kupca
        </a>
    </div>


    {{-- Tabela --}}
    <div class="bg-white border rounded">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">ID</th>
                    <th class="border px-3 py-2 text-left">Naziv</th>
                    <th class="border px-3 py-2 text-left">Adresa</th>
                    <th class="border px-3 py-2 text-left">Telefon</th>
                    <th class="border px-3 py-2 text-left">Email</th>
                    <th class="border px-3 py-2 text-left">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kupacs as $kupac)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2">{{ $kupac->id }}</td>
                        <td class="border px-3 py-2">{{ $kupac->naziv }}</td>
                        <td class="border px-3 py-2">{{ $kupac->adresa }}</td>
                        <td class="border px-3 py-2">{{ $kupac->kontakt_telefon }}</td>
                        <td class="border px-3 py-2">{{ $kupac->email ?? '-' }}</td>

                        <td class="border px-3 py-2">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.kupci.edit', $kupac) }}"
                                   class="text-blue-600 hover:underline">
                                    Izmeni
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.kupci.destroy', $kupac) }}"
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
                        <td colspan="6" class="border px-3 py-4 text-center text-gray-500">
                            Nema unetih kupaca.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(auth()->user()->uloga === 'administrator')
    {{-- Nazad --}}
    <div class="mt-6">
        <a href="{{ route('admin.prodaja-podmeni') }}"
           class="px-4 py-2 border rounded hover:bg-gray-100">
            Nazad na meni
        </a>
    </div>
    @else
        <a href="{{ route('menadzer.menadzer-meni') }}"
        class="px-4 py-2 border rounded hover:bg-gray-100">
            Nazad na meni
        </a>
    @endif


    

</div>
@endsection

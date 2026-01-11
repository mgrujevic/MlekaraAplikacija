@extends('layouts.app')

@section('title', 'Narudžbine')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Naslov + dugme --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Narudžbine</h1>

        <a href="{{ route($prefix . 'narudzbine.create') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            + Nova narudžbina
        </a>
    </div>

    {{-- Tabela --}}
    <div class="bg-white border rounded">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">ID</th>
                    <th class="border px-3 py-2 text-left">Proizvod</th>
                    <th class="border px-3 py-2 text-left">Kupac</th>
                    <th class="border px-3 py-2 text-left">Kolicina</th>
                    <th class="border px-3 py-2 text-left">Datum</th>
                    <th class="border px-3 py-2 text-left">Status</th>
                    <th class="border px-3 py-2 text-left">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($narudzbinas as $narudzbina)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2">{{ $narudzbina->id }}</td>

                        <td class="border px-3 py-2">
                            {{ $narudzbina->proizvod->naziv ?? '-' }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ $narudzbina->kupac->naziv ?? '-' }}
                        </td>

                        
                        <td class="border px-3 py-2">
                            {{ $narudzbina->kolicina }}
                        </td>
                        
                        <td class="border px-3 py-2">
                            {{ $narudzbina->datum
                                ? \Carbon\Carbon::parse($narudzbina->datum)->format('d.m.Y')
                                : '-' }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ ucfirst($narudzbina->status) }}
                        </td>

                        <td class="border px-3 py-2">
                            <div class="flex gap-3">
                                <a href="{{ route($prefix.'narudzbine.edit', $narudzbina) }}"
                                   class="text-blue-600 hover:underline">
                                    Izmeni
                                </a>

                                <form method="POST"
                                      action="{{ route($prefix.'narudzbine.destroy', $narudzbina) }}"
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
                            Nema evidentiranih narudžbina.
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
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            Nazad na meni
        </a>
    </div>
    @else
        <a href="{{ route('menadzer.menadzer-meni') }}"
        class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            Nazad na meni
        </a>
    @endif

</div>
@endsection

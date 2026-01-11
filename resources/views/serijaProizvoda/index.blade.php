@extends('layouts.app')

@section('title', 'Serije proizvoda')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Naslov + dugme --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Serije proizvoda</h1>

        <a href="{{ route('admin.serije-proizvoda.create') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            + Nova serija
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
                    <th class="border px-3 py-2 text-left">Proizvod</th>
                    <th class="border px-3 py-2 text-left">Datum proizvodnje</th>
                    <th class="border px-3 py-2 text-left">Količina</th>
                    <th class="border px-3 py-2 text-left">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($serijaProizvodas as $serija)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2">{{ $serija->id }}</td>

                        <td class="border px-3 py-2">
                            {{ $serija->proizvod->naziv ?? '-' }}
                        </td>


                        <td class="border px-3 py-2">
                            {{ $serija->datum_proizvodnje ? \Carbon\Carbon::parse($serija->datum_proizvodnje)->format('d.m.Y') : '-' }}
                        </td>

                        <td class="border px-3 py-2">{{ $serija->proizvedena_kolicina }}</td>


                        <td class="border px-3 py-2">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.serije-proizvoda.edit', $serija) }}"
                                   class="text-blue-600 hover:underline">
                                    Izmeni
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.serije-proizvoda.destroy', $serija) }}"
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
                        <td colspan="7" class="border px-3 py-4 text-center text-gray-500">
                            Nema evidentiranih serija proizvoda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Nazad --}}
    <div class="mt-6">
        <a href="{{ route('admin.meni') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            Nazad na meni
        </a>
    </div>

</div>
@endsection

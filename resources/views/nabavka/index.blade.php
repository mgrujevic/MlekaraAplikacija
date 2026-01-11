
   @extends('layouts.app')

@section('title', 'Nabavke')

@section('content')
<div class="max-w-6xl mx-auto py-6">

    {{-- Naslov + dugme --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Nabavke</h1>

        <a href="{{ route('admin.nabavke.create') }}"
           class="px-4 py-2 border-4 border-slate-300 rounded-lg
        bg-slate-50 text-slate-700
        hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
        shadow-sm transition-all duration-200">
            + Nova nabavka
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
                    <th class="border px-3 py-2 text-left">Sirovina</th>
                    <th class="border px-3 py-2 text-left">Dobavljač</th>
                    <th class="border px-3 py-2 text-left">Datum</th>
                    <th class="border px-3 py-2 text-left">Količina</th>
                    <th class="border px-3 py-2 text-left">Cena</th>
                    <th class="border px-3 py-2 text-left">Napomena</th>
                    <th class="border px-3 py-2 text-left">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nabavkas as $nabavka)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2">{{ $nabavka->id }}</td>

                        <td class="border px-3 py-2">
                            {{ $nabavka->sirovina->naziv ?? '-' }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ $nabavka->dobavljac->naziv ?? '-' }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ \Carbon\Carbon::parse($nabavka->datum)->format('d.m.Y') }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ $nabavka->kolicina }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ $nabavka->cena }}
                        </td>

                        <td class="border px-3 py-2">
                            {{ $nabavka->napomena ?? '-' }}
                        </td>

                        <td class="border px-3 py-2">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.nabavke.edit', $nabavka) }}"
                                   class="text-blue-600 hover:underline">
                                    Izmeni
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.nabavke.destroy', $nabavka) }}"
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
                            Nema evidentiranih nabavki.
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

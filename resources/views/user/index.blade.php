@extends('layouts.app')

@section('title')
Korisnici
@endsection

@section('content')
<div class="max-w-6xl mx-auto py-6">

    <div class="flex items-start justify-between mb-6">
        <h1 class="text-4xl font-semibold">Korisnici</h1>

        <div class="flex flex-col items-end gap-3">
            <a href="{{ route('admin.meni') }}"
               class="px-4 py-2 border rounded-md hover:bg-gray-100">
                Glavni meni
            </a>

        </div>
    </div>

    <div class="border rounded-md overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-3 py-2 text-left">Ime</th>
                    <th class="border px-3 py-2 text-left">Prezime</th>
                    <th class="border px-3 py-2 text-left">Korisničko ime</th>
                    <th class="border px-3 py-2 text-left">Lozinka</th>
                    <th class="border px-3 py-2 text-left">Uloga</th>
                    <th class="border px-3 py-2 text-left">Akcija</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="border px-3 py-2">{{ $user->ime }}</td>
                        <td class="border px-3 py-2">{{ $user->prezime }}</td>
                        <td class="border px-3 py-2">{{ $user->korisnicko_ime }}</td>
                        <td class="border px-3 py-2">*****</td>
                        <td class="border px-3 py-2">
                            @if($user->uloga === 'administrator')
                                Administrator
                            @elseif($user->uloga === 'operater')
                                Operater
                            @elseif($user->uloga === 'menadzer_prodaje')
                                Menadžer prodaje
                            @else
                                {{ $user->uloga }}
                            @endif
                        </td>
                        <td class="border px-3 py-2">
                            <a href="{{ route('admin.korisnici.edit', $user) }}"
                               class="text-blue-500 hover:underline">
                                Izmeni
                            </a>
                            |
                            <form method="POST"
                                  action="{{ route('admin.korisnici.destroy', $user) }}"
                                  class="inline"
                                  onsubmit="return confirm('Da li ste sigurni?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 hover:underline">
                                    Obriši
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            Nema korisnika.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('admin.korisnici.create') }}"
           class="px-4 py-2 border rounded-md hover:bg-gray-100">
            Dodaj korisnika
        </a>
    </div>

</div>
@endsection

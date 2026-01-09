@extends('layouts.app')

@section('title', 'Glavni meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Glavni meni</h1>

    <div class="flex flex-col items-center gap-6">

        <a href="{{ route('admin.korisnici.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Upravljanje korisnicima
        </a>

        <a href="{{ route('admin.prijem-podmeni') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-1g bg-white hover:bg-gray-50">
            Prijem
        </a>

        <a href="{{ route('admin.serije-proizvoda.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Proizvodnja
        </a>

        <a href="{{ route('admin.prodaja-podmeni') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Prodaja
        </a>

    </div>
</div>
@endsection

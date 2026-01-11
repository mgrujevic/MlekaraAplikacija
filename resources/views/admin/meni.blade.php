@extends('layouts.app')

@section('title', 'Glavni meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Glavni meni</h1>

    <div class="flex flex-col items-center gap-6">

        <a href="{{ route('admin.korisnici.index') }}"
            class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Upravljanje korisnicima
        </a>

        <a href="{{ route('admin.prijem-podmeni') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Prijem
        </a>

        <a href="{{ route('admin.serije-proizvoda.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Proizvodnja
        </a>

        <a href="{{ route('admin.prodaja-podmeni') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Prodaja
        </a>

    </div>
</div>
@endsection

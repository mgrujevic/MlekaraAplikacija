@extends('layouts.app')

@section('title', 'Glavni meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Prijem</h1>

    <div class="flex flex-col items-center gap-6">


        <a href="{{ route('admin.dobavljaci.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Dobavljaci
        </a>

        <a href="{{ route('admin.sirovine.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Sirovine
        </a>

        <a href="{{ route('admin.nabavke.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border-4 rounded-lg
                bg-slate-50 border-slate-300 text-slate-700
                hover:bg-slate-100 hover:border-slate-400 hover:text-slate-900
                transition-colors duration-200">
            Nabavka
        </a>

    </div>
    <div class="mt-6 flex justify-end ">
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
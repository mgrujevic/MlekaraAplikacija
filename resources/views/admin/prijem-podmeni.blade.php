@extends('layouts.app')

@section('title', 'Glavni meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Prijem</h1>

    <div class="flex flex-col items-center gap-6">


        <a href="{{ route('admin.dobavljaci.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Dobavljaci
        </a>

        <a href="{{ route('admin.sirovine.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Sirovine
        </a>

        <a href="{{ route('admin.nabavke.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Nabavka
        </a>

        

    </div>
    <div class="mt-6 flex justify-end ">
        <a href="{{ route('admin.meni') }}"
        class="px-4 py-2 border rounded hover:bg-gray-100">
            Nazad na meni
        </a>
    </div>
</div>
@endsection
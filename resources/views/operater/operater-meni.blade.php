@extends('layouts.app')

@section('title', 'Operater meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Izaberite oblast</h1>

    <div class="flex flex-col items-center gap-6">


        <a href="{{ route('operater.nabavke.create') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Unos nabavki
        </a>

        <a href="{{ route('operater.serije-proizvoda.create') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Kreiranje serije proizvoda
        </a>

    </div>
</div>
@endsection
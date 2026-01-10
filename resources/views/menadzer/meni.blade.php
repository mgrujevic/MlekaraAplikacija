@extends('layouts.app')

@section('title', 'Operater meni')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-4xl font-semibold text-center mb-10">Izaberite oblast</h1>

    <div class="flex flex-col items-center gap-6">


        <a href="{{ route('menadzer.kupci.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Evidencija kupaca
        </a>

        <a href="{{ route('menadzer.narudzbine.index') }}"
           class="w-full sm:w-2/3 text-center px-6 py-4 border rounded-lg bg-white hover:bg-gray-50">
            Upravljanje narudžbinama
        </a>

    </div>
</div>
@endsection
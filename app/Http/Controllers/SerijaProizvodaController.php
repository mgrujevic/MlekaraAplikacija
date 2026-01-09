<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerijaProizvodaStoreRequest;
use App\Http\Requests\SerijaProizvodaUpdateRequest;
use App\Models\SerijaProizvoda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SerijaProizvodaController extends Controller
{
    public function index(Request $request)
    {
        $serijaProizvodas = SerijaProizvoda::all();

        return view('serijaProizvoda.index', [
            'serijaProizvodas' => $serijaProizvodas,
        ]);
    }

    public function create(Request $request)
    {
        return view('serijaProizvoda.create');
    }

    public function store(SerijaProizvodaStoreRequest $request)
    {
        $serijaProizvoda = SerijaProizvoda::create($request->validated());

        $request->session()->flash('serijaProizvoda.id', $serijaProizvoda->id);

        return redirect()->route('serijaProizvodas.index');
    }

    public function show(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        return view('serijaProizvoda.show', [
            'serijaProizvoda' => $serijaProizvoda,
        ]);
    }

    public function edit(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        return view('serijaProizvoda.edit', [
            'serijaProizvoda' => $serijaProizvoda,
        ]);
    }

    public function update(SerijaProizvodaUpdateRequest $request, SerijaProizvoda $serijaProizvoda)
    {
        $serijaProizvoda->update($request->validated());

        $request->session()->flash('serijaProizvoda.id', $serijaProizvoda->id);

        return redirect()->route('serijaProizvodas.index');
    }

    public function destroy(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        $serijaProizvoda->delete();

        return redirect()->route('serijaProizvodas.index');
    }
}

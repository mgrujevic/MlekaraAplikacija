<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerijaProizvodaStoreRequest;
use App\Http\Requests\SerijaProizvodaUpdateRequest;
use App\Models\Proizvod;
use App\Models\SerijaProizvoda;
use Illuminate\Http\Request;

class SerijaProizvodaController extends Controller
{
    public function index(Request $request)
    {
        $serijaProizvodas = SerijaProizvoda::all();

        return view('serijaProizvoda.index', [
            'serijaProizvodas' => $serijaProizvodas,
        ]);
    }

    private function routePrefix(): string
    {
        return request()->routeIs('admin.*') ? 'admin.' : 'operater.';
    }

    public function create(Request $request)
    {
        $proizvodi = Proizvod::all();

        return view('serijaProizvoda.create', [
            'proizvodi' => $proizvodi,
            'prefix' => $this->routePrefix(),
        ]);
    }

    public function store(SerijaProizvodaStoreRequest $request)
    {
        $serijaProizvoda = SerijaProizvoda::create($request->validated());

        $request->session()->flash('serijaProizvoda.id', $serijaProizvoda->id);

        if (auth()->check() && auth()->user()->uloga === 'operater') {
            return back()->with('success', 'Serija je uspešno uneta.');
        }

        return redirect()->route('admin.nabavke.index')
            ->with('success', 'Serija je uspešno uneta.');
    }

    public function show(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        return view('serijaProizvoda.show', [
            'serijaProizvoda' => $serijaProizvoda,
        ]);
    }

    public function edit(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        $proizvodi = Proizvod::All();

        return view('serijaProizvoda.edit', [
            'serijaProizvoda' => $serijaProizvoda,
            'proizvodi' => $proizvodi,
        ]);
    }

    public function update(SerijaProizvodaUpdateRequest $request, SerijaProizvoda $serijaProizvoda)
    {
        $serijaProizvoda->update($request->validated());

        $request->session()->flash('serijaProizvoda.id', $serijaProizvoda->id);

        return redirect()->route('admin.serije-proizvoda.index');
    }

    public function destroy(Request $request, SerijaProizvoda $serijaProizvoda)
    {
        $serijaProizvoda->delete();

        return redirect()->route('admin.serije-proizvoda.index');
    }
}

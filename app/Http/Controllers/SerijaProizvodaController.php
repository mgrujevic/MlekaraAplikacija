<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerijaProizvodaStoreRequest;
use App\Http\Requests\SerijaProizvodaUpdateRequest;
use App\Models\SerijaProizvoda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Proizvod;

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
            'prefix' => $this->routePrefix()
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

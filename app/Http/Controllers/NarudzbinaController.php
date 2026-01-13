<?php

namespace App\Http\Controllers;

use App\Http\Requests\NarudzbinaStoreRequest;
use App\Http\Requests\NarudzbinaUpdateRequest;
use App\Models\Kupac;
use App\Models\Narudzbina;
use App\Models\Proizvod;
use Illuminate\Http\Request;

class NarudzbinaController extends Controller
{
    private function routePrefix(): string
    {
        return request()->routeIs('admin.*') ? 'admin.' : 'menadzer.';
    }

    public function index(Request $request)
    {
        $narudzbinas = Narudzbina::with(['proizvod', 'kupac'])->get();

        return view('narudzbina.index', [
            'narudzbinas' => $narudzbinas,
            'prefix' => $this->routePrefix(),
        ]);
    }

    public function create(Request $request)
    {
        $proizvods = Proizvod::all();
        $kupacs = Kupac::all();

        return view('narudzbina.create', [
            'proizvods' => $proizvods,
            'kupacs' => $kupacs,
            'prefix' => $this->routePrefix(),
        ]);
    }

    public function store(NarudzbinaStoreRequest $request)
    {
        $narudzbina = Narudzbina::create($request->validated());

        $request->session()->flash('narudzbina.id', $narudzbina->id);

        if (auth()->check() && auth()->user()->uloga === 'administrator') {
            return redirect()
                ->route('admin.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno uneta.');
        }

        if (auth()->check() && auth()->user()->uloga === 'menadzer_prodaje') {
            return redirect()
                ->route('menadzer.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno uneta.');
        }
    }

    public function show(Request $request, Narudzbina $narudzbina)
    {
        return view('narudzbina.show', [
            'narudzbina' => $narudzbina,
        ]);
    }

    public function edit(Request $request, Narudzbina $narudzbina)
    {
        $proizvodi = Proizvod::all();
        $kupci = Kupac::all();

        return view('narudzbina.edit', [
            'narudzbina' => $narudzbina,
            'prefix' => $this->routePrefix(),
            'proizvodi' => $proizvodi,
            'kupci' => $kupci,
        ]);
    }

    public function update(NarudzbinaUpdateRequest $request, Narudzbina $narudzbina)
    {
        $narudzbina->update($request->validated());

        $request->session()->flash('narudzbina.id', $narudzbina->id);

        if (auth()->check() && auth()->user()->uloga === 'administrator') {
            return redirect()
                ->route('admin.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno izmenjena.');
        }

        if (auth()->check() && auth()->user()->uloga === 'menadzer_prodaje') {
            return redirect()
                ->route('menadzer.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno izmenjena.');
        }
    }

    public function destroy(Request $request, Narudzbina $narudzbina)
    {
        $narudzbina->delete();

        if (auth()->check() && auth()->user()->uloga === 'administrator') {
            return redirect()
                ->route('admin.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno obrisana.');
        }

        if (auth()->check() && auth()->user()->uloga === 'menadzer_prodaje') {
            return redirect()
                ->route('menadzer.narudzbine.index')
                ->with('success', 'Narudzbina je uspešno obrisana.');
        }
    }
}

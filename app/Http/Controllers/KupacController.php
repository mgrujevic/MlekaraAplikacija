<?php

namespace App\Http\Controllers;

use App\Http\Requests\KupacStoreRequest;
use App\Http\Requests\KupacUpdateRequest;
use App\Models\Kupac;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KupacController extends Controller
{

    private function routePrefix(): string
    {
        return request()->routeIs('admin.*') ? 'admin.' : 'menadzer.';
    }

    public function index(Request $request)
    {
        $kupacs = Kupac::all();

        return view('kupac.index', [
            'kupacs' => $kupacs,
            'prefix' => $this->routePrefix()
        ]);
    }

    public function create(Request $request)
    {
        return view('kupac.create', [
            'prefix' => $this->routePrefix()
        ]);
    }

    public function store(KupacStoreRequest $request)
    {
        $kupac = Kupac::create($request->validated());

        $request->session()->flash('kupac.id', $kupac->id);

        if (auth()->check() && auth()->user()->uloga === 'administrator') {
            return redirect()
                ->route('admin.kupci.index')
                ->with('success', 'Kupac je uspešno unet.');
        }

        if (auth()->check() && auth()->user()->uloga === 'menadzer_prodaje') {
            return redirect()
                ->route('menadzer.kupci.index')
                ->with('success', 'Kupac je uspešno unet.');
        }
    }

    public function show(Request $request, Kupac $kupac)
    {
        return view('kupac.show', [
            'kupac' => $kupac,
        ]);
    }

    public function edit(Request $request, Kupac $kupac)
    {
        return view('kupac.edit', [
            'kupac' => $kupac,
        ]);
    }

    public function update(KupacUpdateRequest $request, Kupac $kupac)
    {
        $kupac->update($request->validated());

        $request->session()->flash('kupac.id', $kupac->id);

        return redirect()->route('kupacs.index');
    }

    public function destroy(Request $request, Kupac $kupac)
    {
        $kupac->delete();

        return redirect()->route('kupacs.index');
    }
}

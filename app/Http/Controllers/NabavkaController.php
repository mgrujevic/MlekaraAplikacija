<?php

namespace App\Http\Controllers;

use App\Http\Requests\NabavkaStoreRequest;
use App\Http\Requests\NabavkaUpdateRequest;
use App\Models\Nabavka;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Dobavljac;
use App\Models\Sirovina;

class NabavkaController extends Controller
{
    public function index(Request $request)
    {
        $nabavkas = Nabavka::all();

        return view('nabavka.index', [
            'nabavkas' => $nabavkas,
        ]);
    }

    public function create(Request $request)
    {
        $dobavljaci = Dobavljac::all();
        $sirovine = Sirovina::all();

        return view('nabavka.create', compact('dobavljaci', 'sirovine'));
    }

    public function store(NabavkaStoreRequest $request)
    {
        $nabavka = Nabavka::create($request->validated());

        $request->session()->flash('nabavka.id', $nabavka->id);

        return redirect()->route('admin.nabavke.index');
    }

    public function show(Request $request, Nabavka $nabavka)
    {
        return view('nabavka.show', [
            'nabavka' => $nabavka,
        ]);
    }

    public function edit(Request $request, Nabavka $nabavka)
    {
        return view('nabavka.edit', [
            'nabavka' => $nabavka,
        ]);
    }

    public function update(NabavkaUpdateRequest $request, Nabavka $nabavka)
    {
        $nabavka->update($request->validated());

        $request->session()->flash('nabavka.id', $nabavka->id);

        return redirect()->route('nabavkas.index');
    }

    public function destroy(Request $request, Nabavka $nabavka)
    {
        $nabavka->delete();

        return redirect()->route('nabavkas.index');
    }
}

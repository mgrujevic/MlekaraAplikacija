<?php

namespace App\Http\Controllers;

use App\Http\Requests\SirovinaStoreRequest;
use App\Http\Requests\SirovinaUpdateRequest;
use App\Models\Sirovina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SirovinaController extends Controller
{
    public function index(Request $request)
    {
        $sirovinas = Sirovina::all();

        return view('sirovina.index', [
            'sirovinas' => $sirovinas,
        ]);
    }

    public function create(Request $request)
    {
        return view('sirovina.create');
    }

    public function store(SirovinaStoreRequest $request)
    {
        $sirovina = Sirovina::create($request->validated());

        $request->session()->flash('sirovina.id', $sirovina->id);

        return redirect()->route('admin.sirovine.index');
    }

    public function show(Request $request, Sirovina $sirovina)
    {
        return view('sirovina.show', [
            'sirovina' => $sirovina,
        ]);
    }

    public function edit(Request $request, Sirovina $sirovina)
    {
        return view('sirovina.edit', [
            'sirovina' => $sirovina,
        ]);
    }

    public function update(SirovinaUpdateRequest $request, Sirovina $sirovina)
    {
        $sirovina->update($request->validated());

        $request->session()->flash('sirovina.id', $sirovina->id);

        return redirect()->route('admin.sirovine.index');
    }

    public function destroy(Request $request, Sirovina $sirovina)
    {
        $sirovina->delete();

        return redirect()->route('admin.sirovine.index');
    }
}

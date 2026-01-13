<?php

namespace App\Http\Controllers;

use App\Http\Requests\PotrosnjaStoreRequest;
use App\Http\Requests\PotrosnjaUpdateRequest;
use App\Models\Potrosnja;
use Illuminate\Http\Request;

class PotrosnjaController extends Controller
{
    public function index(Request $request)
    {
        $potrosnjas = Potrosnja::all();

        return view('potrosnja.index', [
            'potrosnjas' => $potrosnjas,
        ]);
    }

    public function create(Request $request)
    {
        return view('potrosnja.create');
    }

    public function store(PotrosnjaStoreRequest $request)
    {
        $potrosnja = Potrosnja::create($request->validated());

        $request->session()->flash('potrosnja.id', $potrosnja->id);

        return redirect()->route('potrosnjas.index');
    }

    public function show(Request $request, Potrosnja $potrosnja)
    {
        return view('potrosnja.show', [
            'potrosnja' => $potrosnja,
        ]);
    }

    public function edit(Request $request, Potrosnja $potrosnja)
    {
        return view('potrosnja.edit', [
            'potrosnja' => $potrosnja,
        ]);
    }

    public function update(PotrosnjaUpdateRequest $request, Potrosnja $potrosnja)
    {
        $potrosnja->update($request->validated());

        $request->session()->flash('potrosnja.id', $potrosnja->id);

        return redirect()->route('potrosnjas.index');
    }

    public function destroy(Request $request, Potrosnja $potrosnja)
    {
        $potrosnja->delete();

        return redirect()->route('potrosnjas.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    public function create(Request $request)
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('admin.korisnici.index')->with('success', 'Korisnik je uspešno unet.');
    }

    public function show(Request $request, User $user)
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['lozinka'])) {
            $data['lozinka'] = Hash::make($data['lozinka']);
        } else {
            unset($data['lozinka']);
        }

        $user->update($data);

        return redirect()->route('admin.korisnici.index')
            ->with('success', 'Korisnik je izmenjen.');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('admin.korisnici.index');
    }
}

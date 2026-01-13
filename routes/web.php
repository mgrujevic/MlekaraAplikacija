<?php

use App\Http\Controllers\DobavljacController;
use App\Http\Controllers\KupacController;
use App\Http\Controllers\NabavkaController;
use App\Http\Controllers\NarudzbinaController;
use App\Http\Controllers\PotrosnjaController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\SerijaProizvodaController;
use App\Http\Controllers\SirovinaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $uloga = Auth::user()?->uloga;

    return match ($uloga) {
        'administrator' => redirect()->route('admin.meni'),
        'operater' => redirect()->route('operater.operater-meni'),
        'menadzer_prodaje' => redirect()->route('menadzer.menadzer-meni'),
        default => abort(403),
    };
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    // ADMIN
    Route::prefix('admin')->name('admin.')->middleware('role:administrator')->group(function () {

        Route::get('/meni', function () {
            return view('admin.meni');
        })->name('meni');

        Route::get('/prijem-podmeni', function () {
            return view('admin.prijem-podmeni');
        })->name('prijem-podmeni');

        Route::get('/prodaja-podmeni', function () {
            return view('admin.prodaja-podmeni');
        })->name('prodaja-podmeni');

        Route::resource('korisnici', UserController::class)->parameters(['korisnici' => 'user']);
        Route::resource('proizvodi', ProizvodController::class);
        Route::resource('sirovine', SirovinaController::class)->parameters(['sirovine' => 'sirovina']);
        Route::resource('dobavljaci', DobavljacController::class)->parameters(['dobavljaci' => 'dobavljac']);
        Route::resource('nabavke', NabavkaController::class)->parameters(['nabavke' => 'nabavka']);
        Route::resource('serije-proizvoda', SerijaProizvodaController::class)->parameters(['serije-proizvoda' => 'serijaProizvoda']);
        Route::resource('potrosnje', PotrosnjaController::class);
        Route::resource('kupci', KupacController::class)->parameters(['kupci' => 'kupac']);
        Route::resource('narudzbine', NarudzbinaController::class)->parameters(['narudzbine' => 'narudzbina']);
    });

    // OPERATER
    Route::prefix('operater')->name('operater.')->middleware('role:operater')->group(function () {

        Route::get('/operater-meni', function () {
            return view('operater.operater-meni');
        })->name('operater-meni');

        Route::resource('nabavke', NabavkaController::class);
        Route::resource('serije-proizvoda', SerijaProizvodaController::class);
    });

    // MENADŽER PRODAJE
    Route::prefix('menadzer')->name('menadzer.')->middleware('role:menadzer_prodaje')->group(function () {

        Route::get('/menadzer-meni', function () {
            return view('menadzer.meni');
        })->name('menadzer-meni');

        Route::resource('kupci', KupacController::class)->parameters(['kupci' => 'kupac']);
        Route::resource('narudzbine', NarudzbinaController::class)->parameters(['narudzbine' => 'narudzbina']);
    });
});

require __DIR__.'/auth.php';

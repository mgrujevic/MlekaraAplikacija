<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // ili 'korisnici' ako ti je tako u bazi

    protected $fillable = [
        'ime',
        'prezime',
        'korisnicko_ime',
        'lozinka',
        'uloga',
    ];

    protected $hidden = [
        'lozinka',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->lozinka;
    }
}

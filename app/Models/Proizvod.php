<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proizvod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'jedinica_mere',
        'ukupna_kolicina',
        'cena',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'cena' => 'decimal:2',
        ];
    }

    public function serijaProizvodas(): HasMany
    {
        return $this->hasMany(SerijaProizvoda::class);
    }

    public function narudzbinas(): HasMany
    {
        return $this->hasMany(Narudzbina::class);
    }
}

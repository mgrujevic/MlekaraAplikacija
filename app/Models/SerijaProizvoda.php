<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SerijaProizvoda extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proizvod_id',
        'proizvedena_kolicina',
        'datum_proizvodnje',
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
            'proizvod_id' => 'integer',
            'datum_proizvodnje' => 'datetime',
        ];
    }

    public function proizvod(): BelongsTo
    {
        return $this->belongsTo(Proizvod::class);
    }

    public function potrosnjas(): HasMany
    {
        return $this->hasMany(Potrosnja::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Potrosnja extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serija_proizvoda_id',
        'sirovina_id',
        'kolicina',
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
            'serija_proizvoda_id' => 'integer',
            'sirovina_id' => 'integer',
        ];
    }

    public function serijaProizvoda(): BelongsTo
    {
        return $this->belongsTo(SerijaProizvoda::class);
    }

    public function sirovina(): BelongsTo
    {
        return $this->belongsTo(Sirovina::class);
    }
}

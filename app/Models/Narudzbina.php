<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Narudzbina extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proizvod_id',
        'kupac_id',
        'kolicina',
        'datum',
        'status',
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
            'kupac_id' => 'integer',
            'datum' => 'date',
        ];
    }

    public function proizvod(): BelongsTo
    {
        return $this->belongsTo(Proizvod::class);
    }

    public function kupac(): BelongsTo
    {
        return $this->belongsTo(Kupac::class);
    }
}

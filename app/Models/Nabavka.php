<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nabavka extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dobavljac_id',
        'sirovina_id',
        'datum',
        'kolicina',
        'cena',
    ];

    protected $table = 'nabavkas';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'dobavljac_id' => 'integer',
            'sirovina_id' => 'integer',
            'datum' => 'datetime',
            'cena' => 'decimal:2',
        ];
    }

    public function dobavljac()
    {
        return $this->belongsTo(
            Dobavljac::class,
            'dobavljac_id', // FK u nabavkas
            'id'             // PK u dobavljacs
        );
    }
    public function sirovina()
    {
        return $this->belongsTo(
            Sirovina::class,
            'sirovina_id',  // FK u nabavkas
            'id'            // PK u sirovinas
        );
    }
}

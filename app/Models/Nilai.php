<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'kandidat_id', 'kriteria', 'nilai'
    ];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['kandidat_id', 'kriteria_id', 'nilai'];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
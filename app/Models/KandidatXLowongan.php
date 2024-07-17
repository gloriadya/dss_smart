<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KandidatXLowongan extends Model
{
    use HasFactory;
    protected $table = 'kandidat_x_lowongan';

    protected $fillable = [
        'kandidat_id', 'lowongan_id', 'user_created_id'
    ];

    // Relasi dengan tabel kandidat
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }

    // Relasi dengan tabel lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}

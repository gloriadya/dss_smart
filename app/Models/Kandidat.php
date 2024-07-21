<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jurusan', 'jenis_kelamin', 'alamat', 'email',
    ];

    public function KandidatXLowongan()
    {
        return $this->hasMany(KandidatXLowongan::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
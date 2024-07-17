<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lowongan extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'lokasi', 'poster_lowongan', 'tanggal_dibuka', 'tanggal_ditutup'
    ];

    protected $dates = [
        'tanggal_dibuka', 'tanggal_ditutup', 'created_at', 'updated_at'
    ];

    // Relasi dengan tabel kandidat melalui tabel pivot job_posting_kandidat
    public function kandidats()
    {
        return $this->belongsToMany(Kandidat::class, 'job_posting_kandidat', 'lowongan_id', 'kandidat_id')
            ->withTimestamps();
    }
}

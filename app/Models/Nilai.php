<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'kandidat_id',
        'pengalaman_kerja',
        'pendidikan',
        'kepribadian_dan_keterampilan',
        'referensi',
        'tes_keterampilan',
        'kesesuaian_budaya_perusahaan',
        'wawancara',
    ];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}

<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Kandidat extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'email'
//     ];

//     public function nilai()
//     {
//         return $this->hasMany(Nilai::class);
//     }
// }

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Kandidat extends Model
// {
//     protected $fillable = [
//         'nama',
//         'tempat_lahir',
//         'tanggal_lahir',
//         'jenis_kelamin',
//         'alamat',
//         'email',
//     ];
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'email',
=======
        'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'email'
>>>>>>> 34908a597a7a32730dbb82dcd5e90ec2566bbba8
    ];

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}

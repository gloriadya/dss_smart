<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kandidats')->insert([
            [
                'nama' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Merdeka No. 1',
                'email' => 'johndoe@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Jane Smith',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1992-02-02',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Sudirman No. 2',
                'email' => 'janesmith@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Robert Brown',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1993-03-03',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Ahmad Yani No. 3',
                'email' => 'robertbrown@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Emily Davis',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1994-04-04',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Malioboro No. 4',
                'email' => 'emilydavis@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Michael Johnson',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1995-05-05',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Sisingamangaraja No. 5',
                'email' => 'michaeljohnson@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
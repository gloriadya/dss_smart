<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriterias')->insert([
            [
                'nama' => 'Pengalaman Kerja',
                'bobot' => 0.15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Pendidikan',
                'bobot' => 0.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Kepribadian dan Keterampilan',
                'bobot' => 0.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Referensi',
                'bobot' => 0.05,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Tes Keterampilan',
                'bobot' => 0.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Kesesuaian Budaya Perusahaan',
                'bobot' => 0.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Wawancara',
                'bobot' => 0.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NilaiSeeder extends Seeder
{
    public function run()
    {
        $kriteria = [
            'Pengalaman Kerja',
            'Pendidikan',
            'Kepribadian dan Keterampilan',
            'Referensi',
            'Tes Keterampilan',
            'Keterampilan',
            'Keahlian Teknis',
            'Kesesuaian Budaya Perusahaan',
            'Wawancara'
        ];

        $nilaiMapping = [
            'kurang' => rand(1, 25),
            'cukup' => rand(26, 50),
            'baik' => rand(51, 75),
            'sangat_baik' => rand(76, 100),
        ];

        for ($i = 1; $i <= 5; $i++) {
            foreach ($kriteria as $kriteriaItem) {
                DB::table('nilais')->insert([
                    'kandidat_id' => $i,
                    'kriteria' => $kriteriaItem,
                    'nilai' => $nilaiMapping[array_rand($nilaiMapping)],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}